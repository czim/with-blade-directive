<?php
namespace Czim\WithBladeDirective;

use Blade;
use Illuminate\Foundation\Application;

trait RegistersWithDirective
{

    /**
     * Registers the with directive with blade.
     */
    protected function registerWithDirective()
    {
        $isBracketed = $this->isBladeArgumentStringBracketed();

        Blade::directive('with', function ($arguments) use ($isBracketed) {

            $stringSyntaxPart = '\s*[\'"](?<name>[^\'"]+)[\'"]\s*,\s*(?<expression>.*)';
            $asSyntaxPart     = '\s*(?<expression>.*)\s*as\s*\$(?<name>[a-z_]+)\s*';

            if ($isBracketed) {
                $regexStringSyntax = '#^\(' . $stringSyntaxPart . '\)$#s';
                $regexAsSyntax     = '#^\(' . $asSyntaxPart . '\)$#is';
            } else {
                $regexStringSyntax = '#^' . $stringSyntaxPart . '$#s';
                $regexAsSyntax     = '#^' . $asSyntaxPart . '$#is';
            }

            if (    ! preg_match($regexStringSyntax, $arguments, $matches)
                &&  ! preg_match($regexAsSyntax, $arguments, $matches)
            ) {
                return '<b style="color: red">Incorrect @with directive parameters: &quot;' . $arguments . '&quot;</b>';
            }

            return '<?php $' . $matches['name'] . ' = ' . $matches['expression'] . '; ?>';
        });
    }

    /**
     * Returns whether the blade directive argument brackets are included.
     *
     * This behaviour was changed with the release of Laravel 5.3.
     *
     * @return bool
     */
    protected function isBladeArgumentStringBracketed()
    {
        if ( ! preg_match('#^(?<major>\d+)\.(?<minor>\d+)(?:\..*)?$#', Application::VERSION, $matches)) {
            return true;
        }

        $major = (int) $matches['major'];
        $minor = (int) $matches['minor'];

        return ($major < 5 || $major == 5 && $minor < 3);
    }

}

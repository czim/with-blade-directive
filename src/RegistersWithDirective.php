<?php
namespace Czim\WithBladeDirective;

use Blade;

trait RegistersWithDirective
{

    /**
     * Registers the with directive with blade.
     */
    protected function registerWithDirective()
    {
        Blade::directive('with', function ($arguments) {

            $regexStringSyntax = '#^\(\s*[\'"](?<name>[^\'"]+)[\'"]\s*,\s*(?<expression>.*)\)$#';
            $regexAsSyntax     = '#^\(\s*(?<expression>.*)\s*as\s*\$(?<name>[a-z_]+)\s*\)$#i';

            if (    ! preg_match($regexStringSyntax, $arguments, $matches)
                &&  ! preg_match($regexAsSyntax, $arguments, $matches)
            ) {
                return '<b style="color: red">Incorrect @with directive parameters: &quot;' . $arguments . '&quot;</b>';
            }

            return '<?php $' . $matches['name'] . ' = ' . $matches['expression'] . '; ?>';
        });
    }

}

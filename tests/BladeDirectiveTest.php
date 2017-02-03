<?php
namespace Czim\WithBladeDirective\Test;

class BladeDirectiveTest extends TestCase
{

    /**
     * @test
     */
    function it_assigns_variable_using_standard_comma_syntax()
    {
        $rendered = view('wbdtest::default-syntax')->render();

        $this->assertEquals('3', trim($rendered), "View's \$test output does not match");
    }

    /**
     * @test
     */
    function it_assigns_variable_using_as_syntax()
    {
        $rendered = view('wbdtest::as-syntax')->render();

        $this->assertEquals('26', trim($rendered), "View's \$test output does not match");
    }

}

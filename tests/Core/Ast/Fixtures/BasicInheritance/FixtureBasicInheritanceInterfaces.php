<?php

namespace Tests\Qossmic\Deptrac\Core\Ast\Fixtures;

interface FixtureBasicInheritanceInterfaceA { }
interface FixtureBasicInheritanceInterfaceB extends FixtureBasicInheritanceInterfaceA { }
interface FixtureBasicInheritanceInterfaceC extends FixtureBasicInheritanceInterfaceB { }
interface FixtureBasicInheritanceInterfaceD extends FixtureBasicInheritanceInterfaceC { }
interface FixtureBasicInheritanceInterfaceE extends \Tests\Qossmic\Deptrac\Core\Ast\Fixtures\FixtureBasicInheritanceInterfaceD
{ }

<?php
namespace classCV\forCvCreate;

use classCV\InstrumentStaticCV;

class StylisationListSkillByJs
{
    public function __construct()
    {
            InstrumentStaticCV::listSkillFontSetup();
            InstrumentStaticCV::listSkillRowSetup();
            InstrumentStaticCV::loadFunctionEventLoad('listSkillFontSetup');
            InstrumentStaticCV::loadFunctionEventLoad('listSkillRowSetup');
    }
}

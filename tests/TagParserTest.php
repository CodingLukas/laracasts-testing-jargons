<?php

namespace Tests;

use App\TagParser;

class TagParserTest extends \PHPUnit\Framework\TestCase
{
    public function test_it_parses_a_single_tag()
    {
        $parser = new TagParser();

        $result = $parser->parse('personal');
        $expected = ['personal'];

        $this->assertSame($result, $expected);
    }

    public function test_it_parses_a_comma_separated_list_of_tags()
    {
        $parser = new TagParser();

        $result = $parser->parse('personal, money, family');
        $expected = ['personal', 'money', 'family'];
        $this->assertSame($result, $expected);
    }

    public function test_it_parses_a_pipe_separated_list_of_tags()
    {
        $parser = new TagParser();

        $result = $parser->parse('personal | money | family');
        $expected = ['personal', 'money', 'family'];
        $this->assertSame($result, $expected);
    }

    public function test_spaces_are_optional()
    {
        $parser = new TagParser();

        $result = $parser->parse('personal,money,family');
        $expected = ['personal', 'money', 'family'];
        $this->assertSame($result, $expected);

        $result = $parser->parse('personal|money|family');
        $expected = ['personal', 'money', 'family'];
        $this->assertSame($result, $expected);
    }
}
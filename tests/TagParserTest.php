<?php

namespace Tests;

use App\TagParser;

class TagParserTest extends \PHPUnit\Framework\TestCase
{
    protected TagParser $parser;

    protected function setUp(): void
    {
        $this->parser = new TagParser();
    }

    public function test_it_parses_a_single_tag()
    {
        // Given - Arrange
//        $parser = new TagParser();

        // When - Act
        $result = $this->parser->parse('personal');
        $expected = ['personal'];

        // Then - Assert
        $this->assertSame($result, $expected);
    }

    public function test_it_parses_a_comma_separated_list_of_tags()
    {
        $result = $this->parser->parse('personal, money, family');
        $expected = ['personal', 'money', 'family'];
        $this->assertSame($result, $expected);
    }

    public function test_it_parses_a_pipe_separated_list_of_tags()
    {
        $result = $this->parser->parse('personal | money | family');
        $expected = ['personal', 'money', 'family'];
        $this->assertSame($result, $expected);
    }

    public function test_spaces_are_optional()
    {
        $result = $this->parser->parse('personal,money,family');
        $expected = ['personal', 'money', 'family'];
        $this->assertSame($result, $expected);

        $result = $this->parser->parse('personal|money|family');
        $expected = ['personal', 'money', 'family'];
        $this->assertSame($result, $expected);
    }
}
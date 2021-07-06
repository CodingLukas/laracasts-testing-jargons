<?php

namespace Tests;

use App\TagParser;
use PHPUnit\Framework\TestCase;

class TagParserTest extends TestCase
{
    /**
     * @dataProvider tagsProvider
     */
    public function test_it_parses_tags($input, $expected)
    {
        $parser = new TagParser();

        $result = $parser->parse($input);

        $this->assertSame($result, $expected);
    }

    public function tagsProvider()
    {
        return [
            'single' => ['personal', ['personal']],
            'commas' => ['personal, money', ['personal', 'money']],
            'pipes' => ['personal | money', ['personal', 'money']],
            'no_spaces' => ['personal,money', ['personal', 'money']],
            'no_spaces_pipes' => ['personal|money', ['personal', 'money']],
            'exclamation' => ['personal!money', ['personal', 'money']],
        ];
    }

//    public function test_it_parses_a_single_tag()
//    {
//        // Given - Arrange
////        $parser = new TagParser();
//
//        // When - Act
//        $result = $this->parser->parse('personal');
//        $expected = ['personal'];
//
//        // Then - Assert
//        $this->assertSame($result, $expected);
//    }

//    public function test_it_parses_a_comma_separated_list_of_tags()
//    {
//        $result = $this->parser->parse('personal, money, family');
//        $expected = ['personal', 'money', 'family'];
//        $this->assertSame($result, $expected);
//    }

//    public function test_it_parses_a_pipe_separated_list_of_tags()
//    {
//        $result = $this->parser->parse('personal | money | family');
//        $expected = ['personal', 'money', 'family'];
//        $this->assertSame($result, $expected);
//    }

//    public function test_spaces_are_optional()
//    {
//        $result = $this->parser->parse('personal,money,family');
//        $expected = ['personal', 'money', 'family'];
//        $this->assertSame($result, $expected);
//
//        $result = $this->parser->parse('personal|money|family');
//        $expected = ['personal', 'money', 'family'];
//        $this->assertSame($result, $expected);
//    }
}
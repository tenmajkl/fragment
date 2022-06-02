<?php

namespace Majkel\Funktor;

class Codegen
{
    public function __construct(
        private array $template,
        private array $libs = [],
        private array $functions = [],
        private array $structures = [],
    ) {
        
    }
    
    public function generate(): string
    {
        $indent = '';
        $result = '';
        foreach ($this->template as $item) {
            foreach ($item->content as $line) {
                if ($line == '}') {
                    $indent = substr($indent, 1, -4);
                }
                $result .= $indent.$line;   
                if ($line == '{') {
                    $indent .= '    ';
                }
                $result .= "\n";
            }
        }
        return $result;
    }

}
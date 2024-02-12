<?php

namespace LaravelBot\BotFather\Plugin;

class Commands
{
    private array $commands = [];
    private array $param_commands = [];

    public function SetCommand($command, $value): Commands
    {
        $this->commands[$command] = $value;
        return $this;
    }

    public function SetCommands($commands): Commands
    {
        foreach ($commands as $key => $command) {
            $this->commands[$key] = $command;
        }
        return $this;
    }

    public function SetParamCommand($command, $key): Commands
    {
        $this->param_commands[$command] = $key;
        return $this;
    }

    public function GetCommand($text): string|array|null
    {
        $parameter = explode(":", $text);
        if (count($parameter) > 1) {
            $command = $this->findKeyByValue($parameter[0], $this->param_commands);
            preg_match_all('/(\w+):(\w+)/', $text, $matches);
            $result = array_combine($matches[1], $matches[2]);
            return [$command, $result];
        }
        return [$this->findKeyByValue($text, $this->commands), false];
    }

    private function findKeyByValue($searchValue, $array): string|null
    {
        foreach ($array as $key => $value) {
            if (is_array($value)) {
                $result = $this->findKeyByValue($searchValue, $value);
                if ($result !== null) {
                    return $key;
                }
            } elseif ($value === $searchValue) {
                return $key;
            }
        }
        return null;
    }
}
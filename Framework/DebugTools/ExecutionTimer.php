<?php

namespace Framework\DebugTools;

/* @package DebugTools */
class ExecutionTimer
    extends \Framework\Defaults\DefaultClass
{
    private $_startTime;
    private $_endTime;

    /* sets the start time */
    public function startTimer()
    {
        if(FRAMEWORK_DEVELOPMENT_ENVIRONMENT === true)
        {
            $mtime = microtime(false);
            $mtime = explode(" ",$mtime);
            $mtime = $mtime[1] + $mtime[0];
            $this->_startTime = $mtime;
        }
    }

    /* sets the stop time */
    public function stopTimer()
    {
        if(FRAMEWORK_DEVELOPMENT_ENVIRONMENT === true)
        {
            $mtime = microtime(false);
            $mtime = explode(" ",$mtime);
            $mtime = $mtime[1] + $mtime[0];
            $this->_endTime = $mtime;
        }
    }

    /* @return float $totalTime */
    public function parseExecutionTime()
    {
        if(FRAMEWORK_DEVELOPMENT_ENVIRONMENT === true)
        {
            $totalTime = ($this->_endTime - $this->_startTime);

            return (float)$totalTime;
        }
        else
        {
            return \Framework\Defaults\Type\Float;
        }
    }
}
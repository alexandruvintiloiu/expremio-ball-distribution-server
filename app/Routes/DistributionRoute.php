<?php

namespace App\Routes;

class DistributionRoute
{
    /**
     * @param string $uri
     * @return array
     */
    public function getDistributionFromURI(string $uri)
    {
        $distribution = [];
        $re = '/((?\'attr\'[a-zA-Z0-9]+)\((?\'count\'[0-9]+)\))/U';
        preg_match_all($re, $uri, $matches, PREG_SET_ORDER, 0);
        foreach ($matches as $match)
        {
            if(isset($match['attr']) && isset($match['count']))
            {
                $distribution[$match['attr']] = $match['count'];
            }
            else
            {
                abort(403, 'Bad Request');
            }
        }

        return $distribution;
    }
}
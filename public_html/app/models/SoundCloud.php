<?php

class SoundCloud
{
    const CLIENT_ID = 'f7844a0d2655ff6424cda2891baa462d';
    const CLIENT_SECRET = '36078b4b48e44eccf64c868e983cf804';
    const RUWEB_IP = '91.201.40.13';

    public function getTracks()
    {
        $request = new Jyggen\Curl\Request("http://api.soundcloud.com/users/108057656/tracks.json?client_id=" . self::CLIENT_ID);
        $request->setOption(CURLOPT_INTERFACE, self::RUWEB_IP);
        $request->execute();

        if ($request->isSuccessful()) {
            return $request->getResponse()->getContent();
        } else {
            throw new Exception($request->getErrorMessage());
        }
    }
}
<?php

namespace App\Traits;

trait InteractsWithMarketResponses{

    /**
     * Decode correspondingly the response
     * @param array $response
     * @return stdClass Json data
     */
    public function decodeResponse($response){
        /**
         * si existe esta establecido y tiene un valor valido lo retornamos
         * caso contrario solo retornamos sin acceder a el
         */

        $decodedResponse = json_decode($response);
        return $decodedResponse->data ?? $decodedResponse;
    }

    /**
     * Resolve if the request to the service failed
     * @param array $response
     * @return void
     */
    public function checkIfErrorResponse($response){
        if (isset($response->error)){
            throw new \Exception("Something failed: {$response->error}");
        }
    }

}

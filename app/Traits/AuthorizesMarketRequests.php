<?php

namespace App\Traits;

trait AuthorizesMarketRequests{

    /**
     * @param array $query
     * @param array $formParams
     * @param array $headers
     * @return void
     */
    public function resolveAuthorization(&$query, &$formParams, &$headers){
        $access_token = $this->resolveAccessToken();

        $headers['Authorization'] = $access_token;
    }

    public function resolveAccessToken(){
        return 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiI0IiwianRpIjoiOTEwMjA1YzY4ZTgyZGJkY2I1NDkyMTI4NmM0YzFlMjY0OTJkOTdiNjczYmMwZDUzYzdiZGRiM2VkYWZmMTRmNzNlN2Y3OWZmZTVjMjQ3ODYiLCJpYXQiOiIxNjY5MzczODcxLjY2NDQwNCIsIm5iZiI6IjE2NjkzNzM4NzEuNjY0NDA3IiwiZXhwIjoiMTcwMDkwOTg3MS42NjE0NTEiLCJzdWIiOiIxMjg1Iiwic2NvcGVzIjpbInB1cmNoYXNlLXByb2R1Y3QiLCJtYW5hZ2UtcHJvZHVjdHMiLCJtYW5hZ2UtYWNjb3VudCIsInJlYWQtZ2VuZXJhbCJdfQ.ku5BAQ7KQhMNFpnUwJl2X0pO5EBVZAxTy27--qHfVrb79d9ZjlWMQVAUwiLWg79Cr7X3YKgdePY0KdDdRw_QXY3oodr1R6ANnUT9weu8RiMoIwBSLfAtI6ai20SL0hbrDw4VQ2Di-1BAnHTqumnPWUJ4KIENfJ8GjpfGdZwH2WHbeo6iR35JU4EAa8znrUn4XvIqV3fAH34VfmQZyqCEv38cib7yI6wej6VG5qYavcZKOLsyYPG-z7dIFAbeM7Ib8Er_mlcItHTBQm3H_QKkTnKBKytvjCxcvIvHcGjBwcRu1u7Y_aFbcu8HW9ydij5azw5rtIPGwBmprMDCSW0tBVoK5vKNvv3o7r8tDfs3kTINSUh-v-0OrBoEbRYGjntR5TS1c_1Jv3FSGJgx4BhHV9XTkwGXGYK2wI8EHTnXJadrrpUEgWSP88fdYn3U9lroVGrywDPZ_wdcA4nSEDcvM31YAn0Wuiqbkowzl-kFo9Fbly31JFwA0bRzfHDoCNLvx62GIEWDekdO9LHwI21cccHuvutC6-2RWFu7dws1y8Uo_QcFy7Lco-uajM9Ds5kwzHwyFJ25FT0VHJv_uFjgUlIylmzvpr7yM0L0mBGI-TZiazhbLeSI_m6LZOfE3b37DstBBldzeVZg8pCf3cpUQ6YRde1PWJnoH2es1IUJVc4';
    }
}

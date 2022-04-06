<?php

namespace Tests;

use Closure;
use Illuminate\Support\Str;
use Illuminate\Testing\TestResponse;
use PHPUnit\Framework\Assert as PHPUnit;
use PHPUnit\Framework\ExpectationFailedException;

trait MakesJsonApiRequests
{
    protected bool $formatJsonApiDocument = true;
    protected function setUp(): void
    {
        parent::setUp();

        TestResponse::macro('assertJsonApiValidationErrors',
            $this->assertJsonApiValidationErrors()
        );
    }

    protected function assertJsonApiValidationErrors(): Closure
    {
        return function($attribute) {

            /** @var TestResponse $this */

            $pointer = Str::of($attribute)->startsWith('data')
                ? "/".str_replace('.', '/', $attribute)
                : "/data/attributes/{$attribute}";

            try{
                $this->assertJsonFragment([
                    'source' => ['pointer' => $pointer]
                ]);
            }
            catch(ExpectationFailedException $e)
            {
                PHPUnit::fail(
                    "Failed to find a JSON:API validation error for key: '{$attribute}'"
                    .PHP_EOL.PHP_EOL.
                    $e->getMessage()
                );
            }

            try{
                $this->assertJsonStructure([
                    'errors' => [
                        ['title', 'detail', 'source' => ['pointer']]
                    ]
                ]);
            }
            catch(ExpectationFailedException $e)
            {
                PHPUnit::fail(
                    "Failed to find a valid JSON:API error response"
                    .PHP_EOL.PHP_EOL.
                    $e->getMessage()
                );
            }

            $this->assertHeader(
                'content-type', 'application/vnd.api+json'
            )->assertStatus(422);

        };
    }

        public function withoutJsonApiDocumentFormatting()
        {
            $this->formatJsonApiDocument = false;
        }

    public function json($method, $uri, array $data= [], array $headers = []): TestResponse
    {
        $headers['accept']= 'application/vnd.api+json';

        if($this->formatJsonApiDocument)
        {
            $data['data']= $this->getFormattedData($method, $data, $uri);
        }
        return parent::json($method, $uri, $data, $headers);
    }

    public function postJson($uri, array $data = [], array $headers = []): TestResponse
    {
        $headers['content-type']= 'application/vnd.api+json';
        return parent::postJson($uri, $data, $headers);
    }

    public function patchJson($uri, array $data = [], array $headers = []): TestResponse
    {
        $headers['content-type']= 'application/vnd.api+json';
        return parent::patchJson($uri, $data, $headers);
    }

    /**
     * @param array $data
     * @param $uri
     * @return array
     */
    protected function getFormattedData($method, array $data, $uri): array
    {
        //$path1 = '/v1/catalogos/gogo/paises';
        //$path2 = '/v1/catalogos/gogo/paises/1';
        $path = parse_url($uri)['path'];
        $type = ($method == 'POST') ? (string) Str::of($path)->after('v1/') : (string) Str::of($path)->after('v1/')->beforeLast('/');
        $id= (string) Str::of($path)->after($type)->replace('/', '');

        //dd($path, $type, $id);

        return array_filter([
            'attributes' => $data,
            'type' => $type,
            'id' => $id
        ]);
    }
}

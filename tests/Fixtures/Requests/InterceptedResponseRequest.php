<?php declare(strict_types=1);

namespace Saloon\Tests\Fixtures\Requests;

use Saloon\Http\Request;
use Saloon\Http\Responses\SaloonResponse;
use Saloon\Tests\Fixtures\Connectors\TestConnector;

class InterceptedResponseRequest extends Request
{
    /**
     * Define the method that the request will use.
     *
     * @var string|null
     */
    protected string $method = 'GET';

    /**
     * The connector.
     *
     * @var string|null
     */
    protected string $connector = TestConnector::class;

    /**
     * Define the endpoint for the request.
     *
     * @return string
     */
    public function defineEndpoint(): string
    {
        return '/error';
    }

    public function boot(Request $request): void
    {
        $this->addResponseInterceptor(function (Request $request, SaloonResponse $response) {
            $response->setCached(true);

            return $response;
        });
    }
}

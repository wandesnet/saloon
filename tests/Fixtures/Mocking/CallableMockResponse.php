<?php declare(strict_types=1);

namespace Saloon\Tests\Fixtures\Mocking;

use Saloon\Http\Faking\MockResponse;
use Saloon\Http\PendingRequest;

class CallableMockResponse
{
    public function __invoke(PendingRequest $pendingRequest): MockResponse
    {
        return new MockResponse(200, ['request_class' => get_class($pendingRequest->getRequest())]);
    }
}

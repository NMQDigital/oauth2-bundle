<?php

declare(strict_types=1);

namespace Trikoder\Bundle\OAuth2Bundle\Event;

use Symfony\Contracts\EventDispatcher\Event;
use Trikoder\Bundle\OAuth2Bundle\Model\Client;

final class AccessTokenIssueEvent extends Event
{
    /**
     * @var string
     */
    private $username;

    /**
     * @var Client
     */
    private $client;

    /**
     * @var array
     */
    private $extraData = [];

    public function __construct(Client $client, string $username = null)
    {
        $this->username = $username;
        $this->client = $client;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function getClient(): Client
    {
        return $this->client;
    }

    public function getExtraData(): ?array
    {
        return $this->extraData;
    }

    public function addExtraData($key, $value)
    {
        $this->extraData[$key] = $value;

        return $this;
    }

    public function setExtraData(?array $extraData): self
    {
        $this->extraData = $extraData;

        return $this;
    }

    public function hasExtraData(): bool
    {
        return !empty($this->extraData);
    }
}

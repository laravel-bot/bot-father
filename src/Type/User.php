<?php

namespace Ispahbod\BotFather\Type;

use Ispahbod\BotFather\Trait\DataConstructor;

class User
{
    use DataConstructor;

    /**
     * Retrieves the unique identifier for this user or bot.
     * This number may have more than 32 significant bits and some programming languages may have difficulty/silent defects in interpreting it.
     * However, it has at most 52 significant bits, so a 64-bit integer or double-precision float type are safe for storing this identifier.
     *
     * @return int|null The unique identifier if available, otherwise null.
     */
    public function getId(): ?int
    {
        return $this->data['id'] ?? null;
    }

    /**
     * Checks if this user is a bot.
     *
     * @return bool|null True if this user is a bot, otherwise null if the information is not available.
     */
    public function getIsBot(): ?bool
    {
        return $this->data['is_bot'] ?? null;
    }

    /**
     * Retrieves the first name of the user or bot.
     *
     * @return string|null The first name if available, otherwise null.
     */
    public function getFirstName(): ?string
    {
        return $this->data['first_name'] ?? null;
    }

    /**
     * Retrieves the last name of the user or bot if available.
     *
     * @return string|null The last name if available, otherwise null.
     */
    public function getLastName(): ?string
    {
        return $this->data['last_name'] ?? null;
    }

    /**
     * Retrieves the username of the user or bot if available.
     *
     * @return string|null The username if available, otherwise null.
     */
    public function getUsername(): ?string
    {
        return $this->data['username'] ?? null;
    }

    /**
     * Retrieves the username if available, otherwise returns the first name and last name,
     * and if those are not available, returns the unique identifier.
     *
     * @return string|int|null The username, full name, or unique identifier.
     */
    public function getUsernameOrFullNameOrId(bool $prependAt = true)
    {
        if (!empty($this->data['username'])) {
            return $prependAt ? '@' . $this->data['username'] : $this->data['username'];
        } elseif (!empty($this->data['first_name']) || !empty($this->data['last_name'])) {
            return trim(($this->data['first_name'] ?? '') . ' ' . ($this->data['last_name'] ?? ''));
        } else {
            return $this->data['id'] ?? null;
        }
    }

    /**
     * Retrieves the first name and last name if available, otherwise returns the username,
     * and if that is not available, returns the unique identifier.
     *
     * @return string|int|null The full name, username, or unique identifier.
     */
    public function getFullNameOrUsernameOrId(bool $prependAt = true)
    {
        if (!empty($this->data['first_name']) || !empty($this->data['last_name'])) {
            return trim(($this->data['first_name'] ?? '') . ' ' . ($this->data['last_name'] ?? ''));
        } elseif (!empty($this->data['username'])) {
            return $prependAt ? '@' . $this->data['username'] : $this->data['username'];
        } else {
            return $this->data['id'] ?? null;
        }
    }

    /**
     * Retrieves the IETF language tag of the user's language if available.
     *
     * @return string|null The language code if available, otherwise null.
     */
    public function getLanguageCode(): ?string
    {
        return $this->data['language_code'] ?? null;
    }

    /**
     * Checks if this user is a Telegram Premium user.
     *
     * @return bool|null True if this user is a Telegram Premium user, otherwise null if the information is not available.
     */
    public function getIsPremium(): bool
    {
        return $this->data['is_premium'] ?? false;
    }

    /**
     * Checks if this user has added the bot to the attachment menu.
     *
     * @return bool|null True if added to the attachment menu, otherwise null if the information is not available.
     */
    public function getAddedToAttachmentMenu(): ?bool
    {
        return $this->data['added_to_attachment_menu'] ?? null;
    }

    /**
     * Checks if the bot can be invited to groups.
     * This information is returned only in getMe.
     *
     * @return bool|null True if the bot can be invited to groups, otherwise null.
     */
    public function getCanJoinGroups(): ?bool
    {
        return $this->data['can_join_groups'] ?? null;
    }

    /**
     * Checks if privacy mode is disabled for the bot.
     * This information is returned only in getMe.
     *
     * @return bool|null True if privacy mode is disabled, otherwise null.
     */
    public function getCanReadAllGroupMessages(): ?bool
    {
        return $this->data['can_read_all_group_messages'] ?? null;
    }

    /**
     * Checks if the bot supports inline queries.
     * This information is returned only in getMe.
     *
     * @return bool|null True if the bot supports inline queries, otherwise null.
     */
    public function getSupportsInlineQueries(): ?bool
    {
        return $this->data['supports_inline_queries'] ?? null;
    }

    /**
     * Checks if the bot can be connected to a Telegram Business account to receive its messages.
     * This information is returned only in getMe.
     *
     * @return bool|null True if the bot can connect to business, otherwise null.
     */
    public function getCanConnectToBusiness(): ?bool
    {
        return $this->data['can_connect_to_business'] ?? null;
    }
}

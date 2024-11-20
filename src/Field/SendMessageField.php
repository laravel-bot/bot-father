<?php

namespace Ispahbod\BotFather\Field;

use Ispahbod\BotFather\Type\ForceReply;
use Ispahbod\BotFather\Type\InlineKeyboardMarkup;
use Ispahbod\BotFather\Type\LinkPreviewOptions;
use Ispahbod\BotFather\Type\MessageEntity;
use Ispahbod\BotFather\Type\ReplyKeyboardMarkup;
use Ispahbod\BotFather\Type\ReplyKeyboardRemove;
use Ispahbod\BotFather\Type\ReplyParameters;

final class SendMessageField
{
    /**
     * Unique identifier of the business connection on behalf of which the message will be sent.
     * @var string|null
     */
    public const BUSINESS_CONNECTION_ID = 'business_connection_id';

    /**
     * Unique identifier for the target chat or username of the target channel (in the format @channelusername).
     * @var string|int
     */
    public const CHAT_ID = 'chat_id';

    /**
     * Unique identifier for the target message thread (topic) of the forum; for forum supergroups only.
     * @var int|null
     */
    public const MESSAGE_THREAD_ID = 'message_thread_id';

    /**
     * Text of the message to be sent, 1-4096 characters after entities parsing.
     * @var string
     */
    public const TEXT = 'text';

    /**
     * Mode for parsing entities in the message text. See formatting options for more details.
     * @var string|null
     */
    public const PARSE_MODE = 'parse_mode';

    /**
     * A JSON-serialized list of special entities that appear in message text, which can be specified instead of parse_mode.
     * @var array|null
     */
    public const ENTITIES = 'entities';

    /**
     * Link preview generation options for the message.
     * @var LinkPreviewOptions|null
     */
    public const LINK_PREVIEW_OPTIONS = 'link_preview_options';
    public const DISABLE_WEB_PAGE_PREVIEW = 'disable_web_page_preview';

    /**
     * Sends the message silently. Users will receive a notification with no sound.
     * @var bool|null
     */
    public const DISABLE_NOTIFICATION = 'disable_notification';

    /**
     * Protects the contents of the sent message from forwarding and saving.
     * @var bool|null
     */
    public const PROTECT_CONTENT = 'protect_content';

    /**
     * Description of the message to reply to.
     * @var ReplyParameters|null
     */
    public const REPLY_PARAMETERS = 'reply_parameters';

    /**
     * Additional interface options. A JSON-serialized object for an inline keyboard, custom reply keyboard, instructions to remove a reply keyboard or to force a reply from the user.
     * @var InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|ForceReply|null
     */
    public const REPLY_MARKUP = 'reply_markup';

    /**
     * Unique identifier of the message effect to be added to the message; for private chats only
     */
    public const MESSAGE_EFFECT_ID = 'message_effect_id';
}

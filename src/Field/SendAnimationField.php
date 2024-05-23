<?php

namespace Ispahbod\BotFather\Field;

use Ispahbod\BotFather\Type\InputFile;
use Ispahbod\BotFather\Type\MessageEntity;
use Ispahbod\BotFather\Type\ReplyParameters;
use Ispahbod\BotFather\Type\InlineKeyboardMarkup;
use Ispahbod\BotFather\Type\ReplyKeyboardMarkup;
use Ispahbod\BotFather\Type\ReplyKeyboardRemove;
use Ispahbod\BotFather\Type\ForceReply;

final class SendAnimationField
{
    /**
     * Optional. Unique identifier of the business connection on behalf of which the message will be sent.
     * @var string|null
     */
    public const BUSINESS_CONNECTION_ID = 'business_connection_id';

    /**
     * Required. Unique identifier for the target chat or username of the target channel (in the format @channelusername).
     * @var string|int
     */
    public const CHAT_ID = 'chat_id';

    /**
     * Optional. Unique identifier for the target message thread (topic) of the forum; for forum supergroups only.
     * @var int|null
     */
    public const MESSAGE_THREAD_ID = 'message_thread_id';

    /**
     * Required. Animation to send. Pass a file_id as String to send an animation that exists on the Telegram servers (recommended),
     * pass an HTTP URL as a String for Telegram to get an animation from the Internet, or upload a new animation using multipart/form-data.
     * @var InputFile|string
     */
    public const ANIMATION = 'animation';

    /**
     * Optional. Duration of sent animation in seconds.
     * @var int|null
     */
    public const DURATION = 'duration';

    /**
     * Optional. Animation width.
     * @var int|null
     */
    public const WIDTH = 'width';

    /**
     * Optional. Animation height.
     * @var int|null
     */
    public const HEIGHT = 'height';

    /**
     * Optional. Thumbnail of the file sent; can be ignored if thumbnail generation for the file is supported server-side.
     * @var InputFile|string|null
     */
    public const THUMBNAIL = 'thumbnail';

    /**
     * Optional. Animation caption (may also be used when resending animation by file_id), 0-1024 characters after entities parsing.
     * @var string|null
     */
    public const CAPTION = 'caption';

    /**
     * Optional. Mode for parsing entities in the animation caption.
     * @var string|null
     */
    public const PARSE_MODE = 'parse_mode';

    /**
     * Optional. A JSON-serialized list of special entities that appear in the caption, which can be specified instead of parse_mode.
     * @var array<MessageEntity>|null
     */
    public const CAPTION_ENTITIES = 'caption_entities';

    /**
     * Optional. Pass True if the animation needs to be covered with a spoiler animation.
     * @var bool|null
     */
    public const HAS_SPOILER = 'has_spoiler';

    /**
     * Optional. Sends the message silently. Users will receive a notification with no sound.
     * @var bool|null
     */
    public const DISABLE_NOTIFICATION = 'disable_notification';

    /**
     * Optional. Protects the contents of the sent message from forwarding and saving.
     * @var bool|null
     */
    public const PROTECT_CONTENT = 'protect_content';

    /**
     * Optional. Description of the message to reply to.
     * @var ReplyParameters|null
     */
    public const REPLY_PARAMETERS = 'reply_parameters';

    /**
     * Optional. Additional interface options. A JSON-serialized object for an inline keyboard, custom reply keyboard,
     * instructions to remove a reply keyboard or to force a reply from the user.
     * @var InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|ForceReply|null
     */
    public const REPLY_MARKUP = 'reply_markup';
}
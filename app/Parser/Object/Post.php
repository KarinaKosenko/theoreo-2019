<?php


namespace App\Parser\Object;


class Post
{
    /** @const int Идентификатор записи */
    const FIELD_ID = 'id';

    /** @const int Идентификатор владельца стены, на которой размещена запись.
     * В версиях API ниже 5.7 это поле называется to_id.
     */
    const FIELD_OWNER_ID = 'owner_id';

    /** @const int  идентификатор автора записи (от чьего имени опубликована запись). */
    const FIELD_FROM_ID = 'from_id';

    /** @const int идентификатор администратора, который опубликовал запись (возвращается
     * только для сообществ при запросе с ключом доступа администратора).
     */
    const FIELD_CREATED_BY =  'created_by';

    /** @const int время публикации записи в формате unixtime.*/

    const FIELD_DATE =  'date';

       /** @const string  */
    const FIELD_TEXT = 'text';

    /** @const string  */
    const FIELD_REPLY_OWNER_ID = 'reply_owner_id';

    /** @const string  */
    const FIELD_POST_ID = 'reply_post_id';

    /** @const int  1, если запись была создана с опцией «Только для друзей». */
    const FIELD_FRIENDS_ONLY = 'friends_only';

    /** @const object  */
    const FIELD_COMMENTS = 'comments';

    /** @const object  */
    const FIELD_LIKES = 'likes';

    /** @const object  */
    const FIELD_REPOSTS = 'reposts';

    /** @const object  */
    const FIELD_VIEWS = 'views';

    /** @const string  */
    const FIELD_POST_TYPE = 'post_type';

    /** @const obgect  */
    const FIELD_POST_SOURCE = 'post_source';

    /** @const array */
    const FIELD_ATTACHMENTS = 'attachments';

    /** @const object  */
    const FIELD_GEO = 'geo';

    /** @const int  */
    const FIELD_SIGNER_ID = 'signer_id';

    /** @const array  */
    const FIELD_copy_history = 'copy_history';

    /** @const int  */
    const FIELD_CAN_PIN = 'can_pin';

    /** @const int  */
    const FIELD_CAN_DELETE = 'can_delete';

    /** @const int  */
    const FIELD_CAN_EDIT = 'can_edit';

    /** @const int  */
    const FIELD_IS_PINNED = 'is_pinned';

    /** @const int  */
    const FIELD_MARKED_AS_ADS = 'marked_as_ads';

    /** @const bool  */
    const FIELD_IS_FAVORITE = 'is_favorite';

}
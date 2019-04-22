<?php
/**
 * Created by PhpStorm.
 * User: komp
 * Date: 03.04.2019
 * Time: 18:21
 */

namespace App\Parser\Method\Newsfeed;


use App\Parser\Method\Base;

class Get extends Base
{
    /** @const string Название метода в VK API */
    const METHOD = 'newsfeed.get';

    /**
     * Перечисленные через запятую названия списков новостей, которые необходимо получить. Если параметр не задан, то
     * будут получены все возможные списки новостей
     * @var array
     * @see Get::FILTERS_*
     */
    protected $filters;

    /** @const string Новые записи со стены */
    const FILTERS_POST = 'post';

    /** @const string Новые фотографии */
    const FILTERS_PHOTO = 'photo';

    /** @const string Новые отметки на фотографиях */
    const FILTERS_PHOTO_TAG = 'photo_tag';

    /** @const string Новые фотографии на стенах */
    const FILTERS_WALL_PHOTO = 'wall_photo';

    /** @const string Новые друзья */
    const FILTERS_FRIEND = 'friend';

    /** @const string Новые заметки */
    const FILTERS_NOTE = 'note';

    /**
     * Флаг возврата скрытых полей
     * @var int
     * @see Get::RETURN_BANNED_*
     */
    protected $returnBanned;

    /** @const int Не возвращать скрытых пользователей */
    const RETURN_BANNED_NO = 0;

    /** @const int Включить в выдачу также скрытых из новостей пользователей */
    const RETURN_BANNED_YES = 1;

    /** @var int Время в формате unixtime, начиная с которого следует получить новости для текущего пользователя */
    protected $startTime;

    /**
     * Время в формате unixtime, до которого следует получить новости для текущего пользователя. Если параметр не задан,
     * то он считается равным текущему времени
     * @var int
     */
    protected $endTime;

    /** @var int Максимальное количество фотографий, информацию о которых необходимо вернуть. По умолчанию 5 */
    protected $maxPhotos;

    /**
     * Перечисленные через запятую иcточники новостей, новости от которых необходимо получить.
     * Идентификаторы пользователей можно указывать в форматах
     * <uid> или u<uid>, где <uid> — идентификатор друга пользователя.
     *
     * Идентификаторы сообществ можно указывать в форматах
     * -<gid> или g<gid>, где <gid> — идентификатор сообщества.
     *
     * Если параметр не задан, то считается, что он включает список всех друзей и групп пользователя, за исключением
     * скрытых источников, которые можно получить методом newsfeed.getBanned
     * @var array
     * @see Get::SOURCE_IDS_*
     */
    protected $sourceIds;

    /** @const string Список друзей пользователя */
    const SOURCE_IDS_FRIENDS = 'friends';

    /** @const string Список групп, на которые подписан текущий пользователь */
    const SOURCE_IDS_GROUPS = 'groups';

    /** @const string Список публичных страниц, на который подписан тeкущий пользователь */
    const SOURCE_IDS_PAGES = 'pages';

    /** @const string Список пользователей, на которых подписан текущий пользователь */
    const SOURCE_IDS_FOLLOWING = 'following';

    /**
     * list{идентификатор списка новостей} - список новостей. Вы можете найти все списки новостей пользователя используя
     * метод newsfeed.getLists
     * @const string
     */
    const SOURCE_IDS_LIST = 'list';

    /**
     * идентификатор, необходимый для получения следующей страницы результатов. Значение, необходимое для передачи в
     * этом параметре, возвращается в поле ответа next_from
     * @var int
     */
    protected $startFrom;

    /** @var int Указывает, какое максимальное число новостей следует возвращать, но не более 100. По умолчанию 50 */
    protected $count;

    /**
     * Список дополнительных полей профилей, которые необходимо вернуть
     * @var array
     * @see Object\User::FIELD_*
     */
    protected $fields;

}
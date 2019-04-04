<?php

namespace App\Parser\Method\Groups;


use App\Parser\Method\Base;

class Get extends Base
{ /** Название метода в VK API */
    const METHOD = 'groups.get';

    /** @var int Идентификатор пользователя, информацию о сообществах которого требуется получить. */
    protected $userId;

    /**
     * Формат данных
     * @var int
     * @see Get::EXTENDED_*
     */
    protected $extended;

    /** @const int Ответ в стандартной форме */
    const EXTENDED_STANDARD = 0;

    /** @const int Ответ в расширенной форме */
    const EXTENDED_EXTENDED = 1;

    /**
     * Список фильтров сообществ, которые необходимо вернуть. По умолчанию возвращаются все сообщества
     * @var array
     * @see Get::FILTER_*
     */
    protected $filter;

    /** @const string Является администратором */
    const FILTER_ADMIN = 'admin';

    /** @const string Является администратором или редактором */
    const FILTER_EDITOR = 'editor';

    /** @const string Является администратором, редактором или модератором */
    const FILTER_MODER = 'moder';

    /** @const string Возвращать группы */
    const FILTER_GROUPS = 'groups';

    /** @const string Возвращать публичные страницы */
    const FILTER_PUBLICS = 'publics';

    /** @const string Возвращать события */
    const FILTER_EVENTS = 'events';

    /**
     * Список дополнительных полей, которые необходимо вернуть
     * @var array
     * @see Group::FIELD_*
     */
    protected $fields;

    /** @var int Смещение, необходимое для выборки определённого подмножества сообществ */
    protected $offset;

    /** @var int Количество сообществ, информацию о которых нужно вернуть, максимальное значение 1000 */
    protected $count;


}
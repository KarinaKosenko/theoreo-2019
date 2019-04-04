<?php


namespace App\Parser\Method\Wall;


use App\Parser\Method\Base;

class Get extends Base
{
    const METHOD = 'wall.get';
    protected $ownerId;
    protected $domain;
    protected $offset;
    protected $count;
    protected $filter;

    /** @const string Все записи на стене (owner + others) */
    const FILTER_ALL = 'all';

    /** @const string Записи на стене не от ее владельца */
    const FILTER_OTHERS = 'others';

    /** @const string Записи на стене от ее владельца */
    const FILTER_OWNER = 'owner';

    /** @const string отложенные записи (доступно только при вызове с передачей access_token) */
    const FILTER_POSTPONED = 'postponed';

    /** @const string предложенные записи на стене сообщества (доступно только при вызове с передачей access_token) */
    const FILTER_SUGGESTS = 'suggests';
    /**
     * Флаг возврата дополнительных полей wall, profiles и groups
     * @var int
     * @see Get::EXTENDED_*
     */
    protected $extended;
    /** @const int Не возвращать дополнительные поля */
    const EXTENDED_NO = 0;

    /** @const int Возвращать дополнительные поля */
    const EXTENDED_YES = 1;



}
<?php

namespace Chat\Model\Conversation;

use Doctrine\ORM\Mapping\{Column,Id,Entity,Table};

/**
 * This class represents single message within conversation
 *
 * @Entity
 * @Table(name="messages")
 */
class Message
{
    /**
     * @var string
     * @Id
     * @Column(type="guid")
     */
    private $id;
    /**
     * @var string
     * @Column(type="guid")
     */
    private $author;
    /**
     * @var \DateTime
     * @Column(type="carbondatetime")
     */
    private $postedAt;

    /**
     * @var array or message parts
     * @Column(type="json_array")
     */
    private $parts;
}

<?
namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
* @ORM\Entity
* @ORM\Table(name="Task")
*/
class Task
{
/**
* @ORM\Column(type="integer")
* @ORM\Id
* @ORM\GeneratedValue(strategy="AUTO")
*/
protected $id;

/**
* @ORM\Column(type="string")
*/
protected $content;

/**
* @ORM\Column(type="date")
*/
protected $date;

/**
* @ORM\Column(type="date")
*/
protected $dueDate;


/**
 * @ORM\Column(type="boolean")
 */
protected $done;

/**
 * @ORM\Column(type="datetime")
 */
protected $createAt;


/**
 * @ORM\Column(type="integer")
 */
protected $priority;
}
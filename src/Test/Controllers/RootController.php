<?php
namespace Test\Controllers;

use Mouf\Mvc\Splash\Controllers\Controller;
use Mouf\Html\Template\TemplateInterface;
use Mouf\Html\HtmlElement\HtmlBlock;
use Test\Model\Bean\UserBean;
use Test\Model\Dao\Generated\DaoFactory;
use \Twig_Environment;
use Mouf\Html\Renderer\Twig\TwigTemplate;
use Mouf\Mvc\Splash\HtmlResponse;

/**
 * TODO: write controller comment
 */
class RootController extends Controller {

    /**
     * The template used by this controller.
     * @var TemplateInterface
     */
    private $template;

    /**
     * The main content block of the page.
     * @var HtmlBlock
     */
    private $content;

    /**
     * The Twig environment (used to render Twig templates).
     * @var Twig_Environment
     */
    private $twig;


    /**
     * Controller's constructor.
     * @param TemplateInterface $template The template used by this controller
     * @param HtmlBlock $content The main content block of the page
     * @param Twig_Environment $twig The Twig environment (used to render Twig templates)
     */
    public function __construct(TemplateInterface $template, HtmlBlock $content, Twig_Environment $twig, DaoFactory $daoFactory) {
        $this->template = $template;
        $this->content = $content;
        $this->daoFactory = $daoFactory;
        $this->twig = $twig;
    }

    /**
     * @URL /
     */
    public function index() {
        // TODO: write content of action here
        $news = $this->daoFactory->getNewsDao()->getLastNews();

        // Let's add the twig file to the template.
        $this->content->addHtmlElement(new TwigTemplate($this->twig, 'views/root/index.twig', array(
            "message"=>"world",
            "news" => $news
        )));

        return new HtmlResponse($this->template);
    }
}

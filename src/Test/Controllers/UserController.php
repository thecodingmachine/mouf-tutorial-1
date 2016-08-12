<?php
namespace Test\Controllers;

use Mouf\Html\Widgets\MessageService\Service\UserMessageInterface;
use Mouf\Mvc\Splash\Controllers\Controller;
use Mouf\Html\Template\TemplateInterface;
use Mouf\Html\HtmlElement\HtmlBlock;
use Mouf\Security\UserService\UserServiceInterface;
use Psr\Log\LoggerInterface;
use Test\Model\Dao\Generated\DaoFactory;
use \Twig_Environment;
use Mouf\Html\Renderer\Twig\TwigTemplate;
use Mouf\Mvc\Splash\HtmlResponse;
use Zend\Diactoros\Response\RedirectResponse;

/**
 *
 */
class UserController extends Controller {

    /**
     * The logger used by this controller.
     * @var LoggerInterface
     */
    private $logger;

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
     * The DAO factory object.
     * @var DaoFactory
     */
    private $daoFactory;

    /**
     * The Twig environment (used to render Twig templates).
     * @var Twig_Environment
     */
    private $twig;


    /**
     * Controller's constructor.
     * @param LoggerInterface $logger The logger
     * @param TemplateInterface $template The template used by this controller
     * @param HtmlBlock $content The main content block of the page
     * @param DaoFactory $daoFactory The object in charge of retrieving DAOs
     * @param Twig_Environment $twig The Twig environment (used to render Twig templates)
     * @param UserServiceInterface $userService
     */
    public function __construct(LoggerInterface $logger, TemplateInterface $template, HtmlBlock $content, DaoFactory $daoFactory, Twig_Environment $twig, UserServiceInterface $userService) {
        $this->logger = $logger;
        $this->template = $template;
        $this->content = $content;
        $this->daoFactory = $daoFactory;
        $this->twig = $twig;
        $this->userService = $userService;
    }

    /**
     * @URL login
     * @Get
     */
    public function showLoginForm() {
        // Let's add the twig file to the template.
        $this->content->addHtmlElement(new TwigTemplate($this->twig, 'views/user/login.twig', array("message"=>"world")));

        return new HtmlResponse($this->template);
    }

    /**
     * @URL login
     * @Post
     * @param string $email
     * @param string $password
     */
    public function logUser($email, $password) {
        if ($this->userService->login($email, $password)){
            set_user_message("WELL DONE !!", UserMessageInterface::SUCCESS);
            return new RedirectResponse(ROOT_URL . "home");
        }else{
            set_user_message("MISSED, TRY AGAIN", UserMessageInterface::ERROR);
            return new RedirectResponse(ROOT_URL . 'login');
        }

    }

    /**
     * @URL update
     * @Logged
     * @RequiresRight(name='right1')
     * @Post
     * @param int $id
     * @param string $email
     */
    public function update($id, $email) {
        $user = $this->daoFactory->getUserDao()->getById($id);
        $user->setEmail($email);
        $this->daoFactory->getUserDao()->save($user);
        set_user_message("EMAIL CHANGED", UserMessageInterface::SUCCESS);
        return new RedirectResponse(ROOT_URL . 'home');
    }

    /**
     * @Logged
     * @URL home
     * @Get
     */
    public function home() {
        $user = $this->userService->getLoggedUser();
        // Let's add the twig file to the template.
        $this->content->addHtmlElement(new TwigTemplate($this->twig, 'views/user/home.twig', array("user"=>$user)));

        return new HtmlResponse($this->template);
    }

    /**
     * @URL logout
     * @Get
     */
    public function logout() {
        $this->userService->logoff();
        set_user_message("LOGGED OFF !!", UserMessageInterface::SUCCESS);
        return new RedirectResponse(ROOT_URL);
    }
}

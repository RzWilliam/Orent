<?php

namespace App\Controller\Admin;

use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use App\Entity\Famille;
use App\Entity\SousFamille;
use App\Entity\SousSousFamille;

class DashboardController extends AbstractDashboardController
{
    private $adminUrlGenerator;

    public function __construct(AdminUrlGenerator $adminUrlGenerator)
    {
        $this->adminUrlGenerator = $adminUrlGenerator;
    }

    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
        $url = $this->adminUrlGenerator
            ->setController(FamilleCrudController::class)
            ->generateUrl();
        return $this->redirect($url);
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Orent');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToCrud('Famille', 'fa fa-home', Famille::class);
        yield MenuItem::linkToCrud('Sous Famille', 'fa fa-home', SousFamille::class);
        yield MenuItem::linkToCrud('Sous Sous Famille', 'fa fa-home', SousSousFamille::class);
    }
}

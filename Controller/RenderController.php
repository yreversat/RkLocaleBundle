<?php
namespace Rk\LocaleBundle\Controller;

use Exception;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Cookie;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;


class RenderController extends Controller
{
    /**
     * Return Html list, only <li> content link with name and image country
     *
     * @param $route
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function listFlagAction(Request $request, $route)
    {
        /* @var \Rk\LocaleBundle\ConfigureLocale\ConfigureLocale $config */
        $config = $this->container->get('rk_locale.configurelocale');

        $langLiens = [];
        $locale = $request->getLocale();
        foreach ($config->getLocales() as $langue) {
            if($langue !== $locale ) {
                $gets['_locale'] = $langue;
                $langLiens[$langue] = $this->generateUrl($route, $gets);
            }
        }
        return $this->render('RkLocaleBundle::listFlag.html.twig',array('langLiens' => $langLiens));
    }
}

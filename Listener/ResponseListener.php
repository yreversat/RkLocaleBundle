<?php
/**
 * Created by PhpStorm.
 * User: yoann
 * Date: 03/06/14
 * Time: 22:47
 */

namespace Rk\LocaleBundle\Listener;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use \Symfony\Component\HttpKernel\Event\FilterResponseEvent;
use \Symfony\Component\HttpFoundation\Response;
use \Symfony\Component\HttpKernel\HttpKernel;
use Symfony\Component\HttpFoundation\Cookie;

class ResponseListener
{
    protected $domain;

    public function __construct($domain)
    {
        $this->setDomain($domain);
    }

    public function onKernelResponse(FilterResponseEvent $event)
    {
        $response = $event->getResponse();
        $request = $event->getRequest();

        if ($event->getRequestType() != $event->isMasterRequest())
        {
            $cookie = new Cookie('language',$request->getLocale(), time() + 36000 * 24,'/',$this->getDomain());
            $response->headers->setCookie($cookie);
            $response->sendHeaders();
        }
    }

    /**
     * @param mixed $domain
     */
    public function setDomain($domain)
    {
        $this->domain = $domain;
    }

    /**
     * @return mixed
     */
    public function getDomain()
    {
        return $this->domain;
    }


} 
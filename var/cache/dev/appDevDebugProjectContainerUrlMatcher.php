<?php

use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\RequestContext;

/**
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class appDevDebugProjectContainerUrlMatcher extends Symfony\Bundle\FrameworkBundle\Routing\RedirectableUrlMatcher
{
    public function __construct(RequestContext $context)
    {
        $this->context = $context;
    }

    public function match($rawPathinfo)
    {
        $allow = [];
        $pathinfo = rawurldecode($rawPathinfo);
        $trimmedPathinfo = rtrim($pathinfo, '/');
        $context = $this->context;
        $request = $this->request ?: $this->createRequest($pathinfo);
        $requestMethod = $canonicalMethod = $context->getMethod();

        if ('HEAD' === $requestMethod) {
            $canonicalMethod = 'GET';
        }

        if (0 === strpos($pathinfo, '/_')) {
            // _wdt
            if (0 === strpos($pathinfo, '/_wdt') && preg_match('#^/_wdt/(?P<token>[^/]++)$#sD', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, ['_route' => '_wdt']), array (  '_controller' => 'web_profiler.controller.profiler:toolbarAction',));
            }

            if (0 === strpos($pathinfo, '/_profiler')) {
                // _profiler_home
                if ('/_profiler' === $trimmedPathinfo) {
                    $ret = array (  '_controller' => 'web_profiler.controller.profiler:homeAction',  '_route' => '_profiler_home',);
                    if ('/' === substr($pathinfo, -1)) {
                        // no-op
                    } elseif ('GET' !== $canonicalMethod) {
                        goto not__profiler_home;
                    } else {
                        return array_replace($ret, $this->redirect($rawPathinfo.'/', '_profiler_home'));
                    }

                    return $ret;
                }
                not__profiler_home:

                if (0 === strpos($pathinfo, '/_profiler/search')) {
                    // _profiler_search
                    if ('/_profiler/search' === $pathinfo) {
                        return array (  '_controller' => 'web_profiler.controller.profiler:searchAction',  '_route' => '_profiler_search',);
                    }

                    // _profiler_search_bar
                    if ('/_profiler/search_bar' === $pathinfo) {
                        return array (  '_controller' => 'web_profiler.controller.profiler:searchBarAction',  '_route' => '_profiler_search_bar',);
                    }

                }

                // _profiler_phpinfo
                if ('/_profiler/phpinfo' === $pathinfo) {
                    return array (  '_controller' => 'web_profiler.controller.profiler:phpinfoAction',  '_route' => '_profiler_phpinfo',);
                }

                // _profiler_search_results
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/search/results$#sD', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, ['_route' => '_profiler_search_results']), array (  '_controller' => 'web_profiler.controller.profiler:searchResultsAction',));
                }

                // _profiler_open_file
                if ('/_profiler/open' === $pathinfo) {
                    return array (  '_controller' => 'web_profiler.controller.profiler:openAction',  '_route' => '_profiler_open_file',);
                }

                // _profiler
                if (preg_match('#^/_profiler/(?P<token>[^/]++)$#sD', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, ['_route' => '_profiler']), array (  '_controller' => 'web_profiler.controller.profiler:panelAction',));
                }

                // _profiler_router
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/router$#sD', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, ['_route' => '_profiler_router']), array (  '_controller' => 'web_profiler.controller.router:panelAction',));
                }

                // _profiler_exception
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/exception$#sD', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, ['_route' => '_profiler_exception']), array (  '_controller' => 'web_profiler.controller.exception:showAction',));
                }

                // _profiler_exception_css
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/exception\\.css$#sD', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, ['_route' => '_profiler_exception_css']), array (  '_controller' => 'web_profiler.controller.exception:cssAction',));
                }

            }

            // _twig_error_test
            if (0 === strpos($pathinfo, '/_error') && preg_match('#^/_error/(?P<code>\\d+)(?:\\.(?P<_format>[^/]++))?$#sD', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, ['_route' => '_twig_error_test']), array (  '_controller' => 'twig.controller.preview_error:previewErrorPageAction',  '_format' => 'html',));
            }

        }

        // event_default_index
        if ('' === $trimmedPathinfo) {
            $ret = array (  '_controller' => 'EventBundle\\Controller\\DefaultController::indexAction',  '_route' => 'event_default_index',);
            if ('/' === substr($pathinfo, -1)) {
                // no-op
            } elseif ('GET' !== $canonicalMethod) {
                goto not_event_default_index;
            } else {
                return array_replace($ret, $this->redirect($rawPathinfo.'/', 'event_default_index'));
            }

            return $ret;
        }
        not_event_default_index:

        // product_default_index
        if ('' === $trimmedPathinfo) {
            $ret = array (  '_controller' => 'ProductBundle\\Controller\\DefaultController::indexAction',  '_route' => 'product_default_index',);
            if ('/' === substr($pathinfo, -1)) {
                // no-op
            } elseif ('GET' !== $canonicalMethod) {
                goto not_product_default_index;
            } else {
                return array_replace($ret, $this->redirect($rawPathinfo.'/', 'product_default_index'));
            }

            return $ret;
        }
        not_product_default_index:

        if (0 === strpos($pathinfo, '/add')) {
            // addPost
            if ('/addPost' === $pathinfo) {
                return array (  '_controller' => 'ForumBundle\\Controller\\PostController::addPostAction',  '_route' => 'addPost',);
            }

            // addProduct
            if ('/addProduct' === $pathinfo) {
                return array (  '_controller' => 'ProductBundle\\Controller\\ProductControllerController::addProductAction',  '_route' => 'addProduct',);
            }

            // addComment
            if ('/addComment' === $pathinfo) {
                return array (  '_controller' => 'ForumBundle\\Controller\\CommentController::addCommentAction',  '_route' => 'addComment',);
            }

            // addLikes
            if ('/addLikes' === $pathinfo) {
                return array (  '_controller' => 'ForumBundle\\Controller\\LikesController::addLikesAction',  '_route' => 'addLikes',);
            }

            // addEvent
            if ('/addEvent' === $pathinfo) {
                return array (  '_controller' => 'EventBundle\\Controller\\EventController::addEventAction',  '_route' => 'addEvent',);
            }

        }

        // nelmio_api_doc_index
        if (0 === strpos($pathinfo, '/api/doc') && preg_match('#^/api/doc(?:/(?P<view>[^/]++))?$#sD', $pathinfo, $matches)) {
            $ret = $this->mergeDefaults(array_replace($matches, ['_route' => 'nelmio_api_doc_index']), array (  '_controller' => 'Nelmio\\ApiDocBundle\\Controller\\ApiDocController::indexAction',  'view' => 'default',));
            if (!in_array($canonicalMethod, ['GET'])) {
                $allow = array_merge($allow, ['GET']);
                goto not_nelmio_api_doc_index;
            }

            return $ret;
        }
        not_nelmio_api_doc_index:

        if (0 === strpos($pathinfo, '/get')) {
            // getPostById
            if (0 === strpos($pathinfo, '/getPostById') && preg_match('#^/getPostById/(?P<id>[^/]++)$#sD', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, ['_route' => 'getPostById']), array (  '_controller' => 'ForumBundle\\Controller\\PostController::getPostByIdAction',));
            }

            // getProductById
            if (0 === strpos($pathinfo, '/getProductById') && preg_match('#^/getProductById/(?P<id>[^/]++)$#sD', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, ['_route' => 'getProductById']), array (  '_controller' => 'ProductBundle\\Controller\\ProductControllerController::getProductByIdAction',));
            }

            // getCommentById
            if (0 === strpos($pathinfo, '/getCommentById') && preg_match('#^/getCommentById/(?P<id>[^/]++)$#sD', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, ['_route' => 'getCommentById']), array (  '_controller' => 'ForumBundle\\Controller\\CommentController::getCommentByIdAction',));
            }

            // getLikeById
            if (0 === strpos($pathinfo, '/getLikeById') && preg_match('#^/getLikeById/(?P<id>[^/]++)$#sD', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, ['_route' => 'getLikeById']), array (  '_controller' => 'ForumBundle\\Controller\\LikesController::getLikeByIdAction',));
            }

            // getEventById
            if (0 === strpos($pathinfo, '/getEventById') && preg_match('#^/getEventById/(?P<id>[^/]++)$#sD', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, ['_route' => 'getEventById']), array (  '_controller' => 'EventBundle:EventController:getEventById',));
            }

        }

        elseif (0 === strpos($pathinfo, '/edit')) {
            // editPost
            if (0 === strpos($pathinfo, '/editPost') && preg_match('#^/editPost/(?P<id>[^/]++)$#sD', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, ['_route' => 'editPost']), array (  '_controller' => 'ForumBundle\\Controller\\PostController::editPostAction',));
            }

            // editProduct
            if (0 === strpos($pathinfo, '/editProduct') && preg_match('#^/editProduct/(?P<id>[^/]++)$#sD', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, ['_route' => 'editProduct']), array (  '_controller' => 'ProductBundle\\Controller\\ProductControllerController::editProductAction',));
            }

            // editComment
            if (0 === strpos($pathinfo, '/editComment') && preg_match('#^/editComment/(?P<id>[^/]++)$#sD', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, ['_route' => 'editComment']), array (  '_controller' => 'ForumBundle\\Controller\\CommentController::editCommentAction',));
            }

            // editLike
            if (0 === strpos($pathinfo, '/editLike') && preg_match('#^/editLike/(?P<id>[^/]++)$#sD', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, ['_route' => 'editLike']), array (  '_controller' => 'ForumBundle\\Controller\\LikesController::editLikeAction',));
            }

            // editEvent
            if (0 === strpos($pathinfo, '/editEvent') && preg_match('#^/editEvent/(?P<id>[^/]++)$#sD', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, ['_route' => 'editEvent']), array (  '_controller' => 'EventBundle\\Controller\\EventController::editEventAction',));
            }

        }

        elseif (0 === strpos($pathinfo, '/list')) {
            // listPost
            if ('/listPost' === $pathinfo) {
                return array (  '_controller' => 'ForumBundle\\Controller\\PostController::listPostAction',  '_route' => 'listPost',);
            }

            // listProduct
            if ('/listProduct' === $pathinfo) {
                return array (  '_controller' => 'ProductBundle\\Controller\\ProductControllerController::listProductAction',  '_route' => 'listProduct',);
            }

            // listComment
            if ('/listComment' === $pathinfo) {
                return array (  '_controller' => 'ForumBundle\\Controller\\CommentController::listCommentAction',  '_route' => 'listComment',);
            }

            // listLikes
            if ('/listLikes' === $pathinfo) {
                return array (  '_controller' => 'ForumBundle\\Controller\\LikesController::listLikesAction',  '_route' => 'listLikes',);
            }

            // listEvent
            if ('/listEvent' === $pathinfo) {
                return array (  '_controller' => 'EventBundle\\Controller\\EventController::listEventAction',  '_route' => 'listEvent',);
            }

        }

        elseif (0 === strpos($pathinfo, '/delete')) {
            // deletePost
            if (0 === strpos($pathinfo, '/deletePost') && preg_match('#^/deletePost/(?P<id>[^/]++)$#sD', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, ['_route' => 'deletePost']), array (  '_controller' => 'ForumBundle\\Controller\\PostController::deletePostAction',));
            }

            // deleteProduct
            if (0 === strpos($pathinfo, '/deleteProduct') && preg_match('#^/deleteProduct/(?P<id>[^/]++)$#sD', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, ['_route' => 'deleteProduct']), array (  '_controller' => 'ProductBundle\\Controller\\ProductControllerController::deleteProductAction',));
            }

            // deleteComment
            if (0 === strpos($pathinfo, '/deleteComment') && preg_match('#^/deleteComment/(?P<id>[^/]++)$#sD', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, ['_route' => 'deleteComment']), array (  '_controller' => 'ForumBundle\\Controller\\CommentController::deleteCommentAction',));
            }

            // deleteLike
            if (0 === strpos($pathinfo, '/deleteLike') && preg_match('#^/deleteLike/(?P<id>[^/]++)$#sD', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, ['_route' => 'deleteLike']), array (  '_controller' => 'ForumBundle\\Controller\\LikesController::deleteLikeAction',));
            }

            // deleteEvent
            if (0 === strpos($pathinfo, '/deleteEvent') && preg_match('#^/deleteEvent/(?P<id>[^/]++)$#sD', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, ['_route' => 'deleteEvent']), array (  '_controller' => 'EventBundle\\Controller\\EventController::deleteEventAction',));
            }

        }

        // homepage
        if ('' === $trimmedPathinfo) {
            $ret = array (  '_controller' => 'AppBundle\\Controller\\DefaultController::indexAction',  '_route' => 'homepage',);
            if ('/' === substr($pathinfo, -1)) {
                // no-op
            } elseif ('GET' !== $canonicalMethod) {
                goto not_homepage;
            } else {
                return array_replace($ret, $this->redirect($rawPathinfo.'/', 'homepage'));
            }

            return $ret;
        }
        not_homepage:

        if ('/' === $pathinfo && !$allow) {
            throw new Symfony\Component\Routing\Exception\NoConfigurationException();
        }

        throw 0 < count($allow) ? new MethodNotAllowedException(array_unique($allow)) : new ResourceNotFoundException();
    }
}

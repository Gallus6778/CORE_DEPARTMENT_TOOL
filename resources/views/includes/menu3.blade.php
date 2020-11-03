<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
{{--    <link href="{{ asset('css/menuEssai2.css') }}" rel="stylesheet">--}}
    {{--    <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">--}}
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Essai de mneu</title>
</head>
<body>

<div class="amenu-bar">
    <ul>
        <li>
            <a href="#" alt="">NOKIA Vendor<i class="fa fa-cogs"></i></a>
            <div class="asub-menu-1">
                <ul>
                    <li class="ahover-me">
                        <a href="#">Nokia Vendor</a>

                        <i class="fa fa-angle-right"></i>
                        <div class="asub-menu-2">
                            <ul>
{{--                                <li><a href="nokia2g-upgrade-capacity">2G</a></li>--}}
                                <li><a href="/">2G</a></li>
                                <li><a href="nokia3g-xml-FSMF">3G</a></li>
                            </ul>
                        </div>
                    </li>

                    <li class="ahover-me">
                        <a href="#">Huawei Vendor</a>
                        <i class="fa fa-angle-right"></i>
                        <div class="asub-menu-2">
                            <ul>
                                <li><a href="#">2G</a></li>
                                <li><a href="huawei3g-xml">3G</a></li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </li>

{{--        <li><a href="nokia2g-upgrade-capacity" alt="">Upgrade Cap.<i class="fa fa-chart-line"></i></a></li>--}}
        <li><a href="/" alt="">Upgrade Cap.<i class="fa fa-chart-line"></i></a></li>
        <li><a href="nokia2g-trx-block" alt="">TRX BLOCK<i class="fa fa-bell"></i></a></li>

        <li>
            <a href="#" alt="">Xml 3G<i class="fa fa-file"></i></a>

            <div class="asub-menu-1">
                <ul>
                    <li class="ahover-me">
                        <a href="nokia2g-xml">Xml Nokia 2G</a>
                    </li>

                    <li class="ahover-me">
                        <a href="#">Xml Nokia 3G</a>
                        <i class="fa fa-angle-right"></i>
                        <div class="asub-menu-2">
                            <ul>
                                <li><a href="nokia3g-xml-FSME">FSME Module</a></li>
                                <li><a href="nokia3g-xml-FSMF">FSMF Module</a></li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </li>

        <li>
            <a href="#" alt=""> Update data.<i class="fa fa-database"></i></a>
            <div class="asub-menu-1">
                <ul>
                    <li class="ahover-me">
                        <a href="#">BTS Ip Planning </a>
                        <i class="fa fa-angle-right"></i>
                        <div class="asub-menu-2">
                            <ul>
                                <li><a href="nokia-update-data-bts">BTS PLAN</a></li>
                                <li><a href="nokia-update-data-nodeb">NodeB PLAN</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="ahover-me">
                        <a href="#">NPGEP DATA</a>
                    </li>
                    <li class="ahover-me">
                        <a href="nokia-update-data-scrpit-config">Script Config</a>
                    </li>
                    <li class="ahover-me">
                        <a href="nokia2g-upgrade-capacity-update">Sites names and BCSU IP table</a>
                    </li>
                </ul>
            </div>
        </li>

        <li>
            <a href="#" alt="">Other<i class="fa fa-caret-down"></i></a>
            <div class="asub-menu-1">
                <ul>
                    <li class="ahover-me">
                        <a href="#">Rehoming</a>
                        <i class="fa fa-angle-right"></i>
                        <div class="asub-menu-2">
                            <ul>
                                <li><a href="nokia3g-profil-ipnb">generate IPNB Profil </a></li>
                                <li><a href="nokia3g-profil-wbts">generate WBTS Profil</a></li>
                                <li><a href="nokia3g-profil-wcell">generate WCell Profil</a></li>
                            </ul>
                        </div>
                    </li>

{{--                    <li class="ahover-me">--}}
{{--                        <a href="#">Marketing</a>--}}
{{--                        <i class="fa fa-angle-right"></i>--}}
{{--                        <div class="asub-menu-2">--}}
{{--                            <ul>--}}
{{--                                <li><a href="#">SEO</a></li>--}}
{{--                                <li><a href="#">Social Marketing</a></li>--}}
{{--                                <li><a href="#">Email Marketing</a></li>--}}
{{--                            </ul>--}}
{{--                        </div>--}}
{{--                    </li>--}}

{{--                    <li class="ahover-me">--}}
{{--                        <a href="#">Mobile App</a>--}}
{{--                        <i class="fa fa-angle-right"></i>--}}
{{--                        <div class="asub-menu-2">--}}
{{--                            <ul>--}}
{{--                                <li><a href="#">Android App</a></li>--}}
{{--                                <li><a href="#">Ios App</a></li>--}}
{{--                                <li><a href="#">Ionic App</a></li>--}}
{{--                                <li><a href="#">Flutter App</a></li>--}}
{{--                                <li><a href="#">Unity  App</a></li>--}}
{{--                            </ul>--}}
{{--                        </div>--}}
{{--                    </li>--}}
                </ul>
            </div>
        </li>

        <li style="padding: 0; " class="image_nexttel"><img style="height: 7.3vh;margin-left: -25px;width: 180px" src="{{ asset('images/logo_nexttel.png') }}" alt="logo_nexttel"></li>
    </ul>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>

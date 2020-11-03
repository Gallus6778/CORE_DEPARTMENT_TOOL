<div class="header-home-root" id="conteneur">
    <div class="element">
        <ul class="header-home1">
            <a href="#"><li>NOKIA Vendor<i class="fas fa-cogs"></i></li></a>

            <a href="#">
                <li class="generation">
                    2G
                    <i class="fas fa-caret-square-down"></i>
                    <div>
                        <ul>
                            <li><a href="#">2G</a></li>
                            <li><a href="#">3G</a></li>
                        </ul>
                    </div>
                </li>
            </a>
            <a href="{{ url('nokia2g-upgrade-capacity') }}"><li>Upgrade Cap.<i class="fas fa-chart-line"></i></li></a>
            <a href="{{ url('nokia2g-trx-block') }}"><li>TRX BLOCK<i class="fas fa-bell"></i></li></a>
            <a href="{{ url('nokia2g-xml') }}"><li>Xml file<i class="fas fa-file-invoice"></i></li></a>
            <a href="{{ url('nokia-update-data') }}"><li> Update data.<i class="fas fa-database"></i></li></a>
            <a href="#">
                <li>
                    Other
                    <i class="fas fa-caret-square-down"></i>
                </li>
            </a>
        </ul>
    </div>
    <div class="element">
        <ul class="header-home2">
            <li><img src="{{ asset('images/logo_nexttel.png') }}" alt="logo_nexttel"></li>
        </ul>
    </div>
</div>

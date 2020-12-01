<div id="sidebar" class="c-sidebar c-sidebar-fixed c-sidebar-lg-show">

    <div class="c-sidebar-brand d-md-down-none">
        <a class="c-sidebar-brand-full h4" href="#">
            {{ trans('panel.site_title') }}
        </a>
    </div>

    <ul class="c-sidebar-nav">
        <li class="c-sidebar-nav-item">
            <a href="{{ route("admin.home") }}" class="c-sidebar-nav-link">
                <i class="c-sidebar-nav-icon fas fa-fw fa-tachometer-alt">

                </i>
                {{ trans('global.dashboard') }}
            </a>
        </li>
        @can('notizie_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.notizies.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/notizies") || request()->is("admin/notizies/*") ? "c-active" : "" }}">
                    <i class="fa-fw far fa-newspaper c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.notizie.title') }}
                </a>
            </li>
        @endcan
        @can('organizzazione_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/dealers*") ? "c-show" : "" }} {{ request()->is("admin/dealer-points*") ? "c-show" : "" }} {{ request()->is("admin/agentis*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.organizzazione.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('dealer_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.dealers.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/dealers") || request()->is("admin/dealers/*") ? "c-active" : "" }}">
                                <i class="fa-fw far fa-address-book c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.dealer.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('dealer_point_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.dealer-points.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/dealer-points") || request()->is("admin/dealer-points/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-store c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.dealerPoint.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('agenti_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.agentis.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/agentis") || request()->is("admin/agentis/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-user-alt c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.agenti.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('gare_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/vendites*") ? "c-show" : "" }} {{ request()->is("admin/gare-inserimentos*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-briefcase c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.gare.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('vendite_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.vendites.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/vendites") || request()->is("admin/vendites/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-cart-plus c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.vendite.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('gare_inserimento_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.gare-inserimentos.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/gare-inserimentos") || request()->is("admin/gare-inserimentos/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-magic c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.gareInserimento.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('anagrafiche_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/brands*") ? "c-show" : "" }} {{ request()->is("admin/categories*") ? "c-show" : "" }} {{ request()->is("admin/tecnologia*") ? "c-show" : "" }} {{ request()->is("admin/offertes*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-align-left c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.anagrafiche.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('brand_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.brands.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/brands") || request()->is("admin/brands/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-bold c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.brand.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('categorie_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.categories.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/categories") || request()->is("admin/categories/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-book-open c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.categorie.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('tecnologium_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.tecnologia.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/tecnologia") || request()->is("admin/tecnologia/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.tecnologium.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('offerte_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.offertes.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/offertes") || request()->is("admin/offertes/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-cubes c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.offerte.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('user_management_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/permissions*") ? "c-show" : "" }} {{ request()->is("admin/roles*") ? "c-show" : "" }} {{ request()->is("admin/users*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-users c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.userManagement.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('permission_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.permissions.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/permissions") || request()->is("admin/permissions/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-unlock-alt c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.permission.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('role_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.roles.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/roles") || request()->is("admin/roles/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-briefcase c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.role.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('user_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.users.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/users") || request()->is("admin/users/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-user c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.user.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('elenchi_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.elenchi.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('geografici_access')
                        <li class="c-sidebar-nav-dropdown {{ request()->is("admin/regionis*") ? "c-show" : "" }} {{ request()->is("admin/provinces*") ? "c-show" : "" }} {{ request()->is("admin/citta*") ? "c-show" : "" }}">
                            <a class="c-sidebar-nav-dropdown-toggle" href="#">
                                <i class="fa-fw fas fa-map-marked-alt c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.geografici.title') }}
                            </a>
                            <ul class="c-sidebar-nav-dropdown-items">
                                @can('regioni_access')
                                    <li class="c-sidebar-nav-item">
                                        <a href="{{ route("admin.regionis.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/regionis") || request()->is("admin/regionis/*") ? "c-active" : "" }}">
                                            <i class="fa-fw fas fa-folder c-sidebar-nav-icon">

                                            </i>
                                            {{ trans('cruds.regioni.title') }}
                                        </a>
                                    </li>
                                @endcan
                                @can('province_access')
                                    <li class="c-sidebar-nav-item">
                                        <a href="{{ route("admin.provinces.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/provinces") || request()->is("admin/provinces/*") ? "c-active" : "" }}">
                                            <i class="fa-fw fas fa-map-marked-alt c-sidebar-nav-icon">

                                            </i>
                                            {{ trans('cruds.province.title') }}
                                        </a>
                                    </li>
                                @endcan
                                @can('cittum_access')
                                    <li class="c-sidebar-nav-item">
                                        <a href="{{ route("admin.citta.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/citta") || request()->is("admin/citta/*") ? "c-active" : "" }}">
                                            <i class="fa-fw fas fa-folder-open c-sidebar-nav-icon">

                                            </i>
                                            {{ trans('cruds.cittum.title') }}
                                        </a>
                                    </li>
                                @endcan
                            </ul>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('user_parameter_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.user-parameters.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/user-parameters") || request()->is("admin/user-parameters/*") ? "c-active" : "" }}">
                    <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.userParameter.title') }}
                </a>
            </li>
        @endcan
        @can('grab_data_mexal_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.grab-data-mexals.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/grab-data-mexals") || request()->is("admin/grab-data-mexals/*") ? "c-active" : "" }}">
                    <i class="fa-fw fas fa-clipboard-list c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.grabDataMexal.title') }}
                </a>
            </li>
        @endcan
        @can('system_table_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/exportlogs*") ? "c-show" : "" }} {{ request()->is("admin/soggetti-fatturatos*") ? "c-show" : "" }} {{ request()->is("admin/soggetti-tipologia*") ? "c-show" : "" }} {{ request()->is("admin/gare-inserimento-dettaglis*") ? "c-show" : "" }} {{ request()->is("admin/inserimento-gare-soglies*") ? "c-show" : "" }} {{ request()->is("admin/inserimento-soglie-ranges*") ? "c-show" : "" }} {{ request()->is("admin/soggetti-relationships*") ? "c-show" : "" }} {{ request()->is("admin/dealer-mandatis*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.systemTable.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('exportlog_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.exportlogs.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/exportlogs") || request()->is("admin/exportlogs/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.exportlog.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('soggetti_fatturato_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.soggetti-fatturatos.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/soggetti-fatturatos") || request()->is("admin/soggetti-fatturatos/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-cart-plus c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.soggettiFatturato.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('soggetti_tipologium_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.soggetti-tipologia.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/soggetti-tipologia") || request()->is("admin/soggetti-tipologia/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-address-card c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.soggettiTipologium.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('gare_inserimento_dettagli_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.gare-inserimento-dettaglis.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/gare-inserimento-dettaglis") || request()->is("admin/gare-inserimento-dettaglis/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.gareInserimentoDettagli.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('inserimento_gare_soglie_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.inserimento-gare-soglies.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/inserimento-gare-soglies") || request()->is("admin/inserimento-gare-soglies/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.inserimentoGareSoglie.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('inserimento_soglie_range_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.inserimento-soglie-ranges.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/inserimento-soglie-ranges") || request()->is("admin/inserimento-soglie-ranges/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.inserimentoSoglieRange.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('soggetti_relationship_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.soggetti-relationships.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/soggetti-relationships") || request()->is("admin/soggetti-relationships/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-hands-helping c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.soggettiRelationship.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('dealer_mandati_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.dealer-mandatis.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/dealer-mandatis") || request()->is("admin/dealer-mandatis/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-hands-helping c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.dealerMandati.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @if(file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php')))
            @can('profile_password_edit')
                <li class="c-sidebar-nav-item">
                    <a class="c-sidebar-nav-link {{ request()->is('profile/password') || request()->is('profile/password/*') ? 'c-active' : '' }}" href="{{ route('profile.password.edit') }}">
                        <i class="fa-fw fas fa-key c-sidebar-nav-icon">
                        </i>
                        {{ trans('global.change_password') }}
                    </a>
                </li>
            @endcan
        @endif
        <li class="c-sidebar-nav-item">
            <a href="#" class="c-sidebar-nav-link" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                <i class="c-sidebar-nav-icon fas fa-fw fa-sign-out-alt">

                </i>
                {{ trans('global.logout') }}
            </a>
        </li>
    </ul>

</div>
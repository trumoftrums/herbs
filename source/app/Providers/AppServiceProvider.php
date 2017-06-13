<?php

namespace Vanguard\Providers;

use Carbon\Carbon;
use Vanguard\Project;
use Vanguard\Repositories\Activity\ActivityRepository;
use Vanguard\Repositories\Activity\EloquentActivity;
use Vanguard\Repositories\Ads\AdsRepository;
use Vanguard\Repositories\Ads\EloquentAds;
use Vanguard\Repositories\BienDong\BienDongRepository;
use Vanguard\Repositories\BienDong\EloquentBienDong;
use Vanguard\Repositories\CatNews\CatNewsRepository;
use Vanguard\Repositories\CatNews\EloquentCatNews;
use Vanguard\Repositories\Country\CountryRepository;
use Vanguard\Repositories\Country\EloquentCountry;
use Vanguard\Repositories\InvestType\EloquentInvestType;
use Vanguard\Repositories\InvestType\InvestTypeRepository;
use Vanguard\Repositories\Invest\InvestRepository;
use Vanguard\Repositories\Invest\EloquentInvest;
use Vanguard\Repositories\News\EloquentNews;
use Vanguard\Repositories\News\NewsRepository;
use Vanguard\Repositories\Permission\EloquentPermission;
use Vanguard\Repositories\Permission\PermissionRepository;
use Vanguard\Repositories\QA\EloquentQA;
use Vanguard\Repositories\QA\QARepository;
use Vanguard\Repositories\Role\EloquentRole;
use Vanguard\Repositories\Role\RoleRepository;
use Vanguard\Repositories\Session\DbSession;
use Vanguard\Repositories\Session\SessionRepository;
use Vanguard\Repositories\TuDien\EloquentTuDien;
use Vanguard\Repositories\TuDien\TuDienRepository;
use Vanguard\Repositories\User\EloquentUser;
use Vanguard\Repositories\User\UserRepository;
use Illuminate\Support\ServiceProvider;
use Vanguard\Repositories\Video\VideoRepository;
use Vanguard\Repositories\Video\EloquentVideo;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('layouts.frontend', function ($view)
        {
            $this->listProjects = Project::getList();

            $view->with([
                'listProjects'=>$this->listProjects
            ]);
        });
        Carbon::setLocale(config('app.locale'));
        config(['app.name' => settings('app_name')]);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(UserRepository::class, EloquentUser::class);
        $this->app->singleton(ActivityRepository::class, EloquentActivity::class);
        $this->app->singleton(RoleRepository::class, EloquentRole::class);
        $this->app->singleton(PermissionRepository::class, EloquentPermission::class);
        $this->app->singleton(SessionRepository::class, DbSession::class);
        $this->app->singleton(CountryRepository::class, EloquentCountry::class);
        $this->app->singleton(CatNewsRepository::class, EloquentCatNews::class);
        $this->app->singleton(TuDienRepository::class, EloquentTuDien::class);
        $this->app->singleton(AdsRepository::class, EloquentAds::class);
        $this->app->singleton(VideoRepository::class, EloquentVideo::class);

        $this->app->singleton(InvestTypeRepository::class, EloquentInvestType::class);
        $this->app->singleton(BienDongRepository::class, EloquentBienDong::class);
        $this->app->singleton(InvestRepository::class, EloquentInvest::class);
        $this->app->singleton(NewsRepository::class, EloquentNews::class);
        $this->app->singleton(QARepository::class, EloquentQA::class);
        if ($this->app->environment('local')) {
            $this->app->register(\Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider::class);
            $this->app->register(\Barryvdh\Debugbar\ServiceProvider::class);
        }
    }
}

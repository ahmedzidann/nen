<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Country;
use App\Models\Education;
use App\Models\FeatureAdvantages;
use App\Models\FindUs;
use App\Models\Page;
use App\Models\Project;
use App\Models\SidebarResource;
use App\Models\Solution;
use App\Models\Technology;
use App\Models\Testing;
use Hamcrest\FeatureMatcher;
use Illuminate\Http\Request;

class HomeController extends Controller
{
   public function getHome()
   {
      $projects = $this->getProjects();
      $upperDidebarResources = $this->getSidebarResources(1);
      $lowerDidebarResources = $this->getSidebarResources(2);
      $educations = $this->getEducation();
      $testings = $this->getTesting();
      $solutions = $this->getSolutions();
      $technologies = $this->getTechnologies();
      $home = $this->getHomeData();
      $blogs = $this->getOurBlogs();
      $feature = $this->getFeatureAdvantages();
      $findus = $this->getFindUsData();
      $countries = $this->getCountries();

      return view('user.home.home', \compact(
         'projects',
         'upperDidebarResources',
         'lowerDidebarResources',
         'educations',
         'testings',
         'solutions',
         'technologies',
         'home',
         'blogs',
         'feature',
         'findus',
         'countries',
      ));
   }

   /**
    * getProjects
    *
    * @return Illuminate\Database\Eloquent\Collection
    */
   public function getProjects()
   {
      return Project::where('show_in_home', true)->latest()->limit(5)->get();
   }

   /**
    * getSidebarResources
    *
    * @return Illuminate\Database\Eloquent\Collection
    */
   public function getSidebarResources(int $type)
   {
      return SidebarResource::where('show_in_home', true)->where('type', $type)->latest()->get();
   }

   /**
    * getEducation
    *
    * @return Illuminate\Database\Eloquent\Collection
    */
   public function getEducation()
   {
      return Education::where('show_in_home', true)->where('status', 'Active')->latest()->limit(3)->get();
   }

   /**
    * getTesting
    *
    * @return Illuminate\Database\Eloquent\Collection
    */
   public function getTesting()
   {
      return Testing::where('show_in_home', true)->where('status', 'Active')->latest()->limit(2)->get();
   }

   /**
    * getSolutions
    *
    * @return Illuminate\Database\Eloquent\Collection
    */
   public function getSolutions()
   {
      return Solution::with('Page')->where('show_in_home', true)->where('status', 'Active')->latest()->get()->groupBy('pages_id');
   }

   /**
    * getTechnologies
    *
    * @return Illuminate\Database\Eloquent\Collection
    */
   public function getTechnologies()
   {
      return Technology::query()->where('show_in_home', true)->where('status', 'Active')->latest()->limit(6)->get();
   }

   /**
    * getHomeData
    *
    * @return Illuminate\Database\Eloquent\Collection
    */
   public function getHomeData()
   {
      return Page::whereSlug('Home')->latest()->first();
   }

   /**
    * getOurBlogs
    *
    * @return Illuminate\Database\Eloquent\Collection
    */
   public function getOurBlogs()
   {
      return Blog::where('show_in_home', true)->latest()->limit(6)->get();
   }

   /**
    * getOurBlogs
    *
    * @return Illuminate\Database\Eloquent\Collection
    */
   public function getFeatureAdvantages()
   {
      return FeatureAdvantages::with('files')->first();
   }

   /**
    * getFindUsData
    *
    * @return Illuminate\Database\Eloquent\Collection
    */
   public function getFindUsData()
   {
      return Page::where('parent_id', Page::where('slug', 'find-us')->first()->id)
         ->where('navbar', 'Active')->latest()->limit(6)->get();
   }

   /**
    * getCountries
    *
    * @return Illuminate\Database\Eloquent\Collection
    */
   public function getCountries()
   {
      return FindUs::query()->with('state')->get();
   }
}

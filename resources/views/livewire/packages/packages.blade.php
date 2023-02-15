<main class="tk-main-bg">
    <section class="tk-main-section">
        <div class="container">
            @if( !empty($packages) || !$packages->isEmpty() )
                <div class="tk-pricingholder">
                    <div class="row justify-content-center">
                        <div class="col-lg-9 col-xl-8">
                            <div class="tk-sectioninfo tk-sectioninfov2 tk-sectioncenter">
                                <div class="tk-sectiontitle text-center">
                                    <h3>{{ __('general.packages_offer') }}</h3>
                                    <h2 class="tk-sectiontitle__bold">{{ __('general.packages_info_title') }}</h2>
                                    <div class="tk-main-description">
                                        <p>{!! nl2br(__('general.packages_info_desc')) !!}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tk-pricing">
                        <div class="row">
                            @foreach( $packages as $single )
                                @php
                                    $options  = unserialize($single->options);
                                    $duration  = $options['duration'] > 1 ? $options['duration'] .' '. $options['type'].'s' : $options['duration'] .' '. $options['type'];
                                @endphp
                                <div class="col-md-6 col-lg-4">
                                    <div class="tk-pricing__content">
                                        @php
                                            $image = '';
                                        if( $single->image != ''){
                                            $image = unserialize($single->image);
                                            $image = asset('storage/' .$image['file_path']);
                                        }
                                        @endphp
                                        @if( $image != '')
                                            <img src="{{ $image }}" >
                                        @endif
                                        <h4>{{ $single->title }}</h4>
                                        <h2><sup>{{ $currency_symbol }}</sup>{{ number_format( $single->price, 2) }}</h2>
                                        <h4>{{ __('general.'.$options['type']) }}</h4>
                                        <em>{{ __('general.include_all_tax') }}</em>
                                        <ul class="tk-pricinglist">
                                            <li>
                                                <div class="tk-pricinglist__content">
                                                    <span>{{ __('general.package_duration') }}</span>
                                                    <span>{{ $duration }}</span>
                                                </div>
                                            </li>
                                            @if( $single->package_role->name == 'buyer')
                                                <li>
                                                    <div class="tk-pricinglist__content">
                                                        <span>{{ __('general.no_of_projects') }}</span>
                                                        <span>{{ $options['posted_projects'] }} {{ __('general.projects') }}</span>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="tk-pricinglist__content">
                                                        <span>{{ __('general.feature_projects') }}</span>
                                                        <span>{{ $options['featured_projects'] }} {{ __('general.allowed') }}</span>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="tk-pricinglist__content">
                                                        <span>{{ __('general.feature_project_duration') }}</span>
                                                        <span>{{ $options['project_featured_days'] }} {{ __('general.day') }}</span>
                                                    </div>
                                                </li>
                                            @else
                                                <li>
                                                    <div class="tk-pricinglist__content">
                                                        <span>{{ __('general.credit_for_project') }}</span>
                                                        <span>{{ $options['credits'] }} {{ __('general.credits') }}</span>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="tk-pricinglist__content">
                                                        <span>{{ __('general.profile_feature_duration') }}</span>
                                                        <span>{{ $options['profile_featured_days'] }} {{ __('general.day') }}</span>
                                                    </div>
                                                </li>
                                            @endif
                                        </ul>
                                        <a href="javascript:;" wire:click.prevent="buyPackage({{ $single->id }})"  class="tk-btn-solid-lg">{{ __('general.buy_now') }}</a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </section>
</main>
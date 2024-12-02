        {{-- <div class="container">
            <div class="row g-3">
                <!-- Card 1: Add Brand Profiles -->
                <div class="col-6 col-md-4 col-lg-3 col-xl-2 px-1">
                    <div class="brand-card light-blue">
                        <div class="brand-card-icon">
                            <i class="bi bi-plus-lg"></i>
                        </div>
                        <div class="card-texts">
                            <div class="brand-card-title">Add Brand Profiles</div>
                        </div>
                    </div>
                </div>

                <!-- Card 2: AI Analytics -->
                <div class="col-6 col-md-4 col-lg-3 col-xl-2 px-1">
                    <div class="brand-card light-pink">
                        <div class="brand-card-icon">
                            <i class="bi bi-bar-chart"></i>
                        </div>
                        <div class="card-texts">
                            <div class="brand-card-title">AI Analytics</div>
                            <div class="brand-card-category">Data Science</div>
                        </div>
                    </div>
                </div>

                <!-- Card 3: AI Vision -->
                <div class="col-6 col-md-4 col-lg-3 col-xl-2 px-1">
                    <div class="brand-card light-green">
                        <div class="brand-card-icon">
                            <i class="bi bi-eye-fill"></i>
                        </div>
                        <div class="card-texts">
                            <div class="brand-card-title">AI Vision</div>
                            <div class="brand-card-category">Computer Vision</div>
                        </div>
                    </div>
                </div>

                <!-- Card 4: AI Chatbots -->
                <div class="col-6 col-md-4 col-lg-3 col-xl-2 px-1">
                    <div class="brand-card light-yellow">
                        <div class="brand-card-icon">
                            <i class="bi bi-chat-square-dots"></i>
                        </div>
                        <div class="card-texts">
                            <div class="brand-card-title">AI Chatbots</div>
                            <div class="brand-card-category">Conversational AI</div>
                        </div>
                    </div>
                </div>

                <!-- Card 5: AI Robotics -->
                <div class="col-6 col-md-4 col-lg-3 col-xl-2 px-1">
                    <div class="brand-card light-purple">
                        <div class="brand-card-icon">
                            <i class="bi bi-robot"></i>
                        </div>
                        <div class="card-texts">
                            <div class="brand-card-title">AI Robotics</div>
                            <div class="brand-card-category">Automation</div>
                        </div>
                    </div>
                </div>

                <!-- Card 6: AI Tools -->
                <div class="col-6 col-md-4 col-lg-3 col-xl-2 px-1">
                    <div class="brand-card light-teal">
                        <div class="brand-card-icon">
                            <i class="bi bi-tools"></i>
                        </div>
                        <div class="card-texts">
                            <div class="brand-card-title">AI Tools</div>
                            <div class="brand-card-category">Utilities</div>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
        @if (count($rows) > 0)
            <div class="container">
                <div class="row g-3">
                    @foreach ($rows as $row)
                        <!-- Card 2: AI Analytics -->
                        <a href="{{ $row->url }}" target="_blank">
                            <div class="col-6 col-md-4 col-lg-3 col-xl-2 px-1">
                                <div class="brand-card light-pink">
                                    <div class="brand-card-icon">
                                        <i class="bi bi-bar-chart"></i>
                                    </div>
                                    <div class="card-texts">
                                        <div class="brand-card-title">{{ $row->title }}</div>
                                        @if ($row->sub_title)
                                            <div class="brand-card-category">{{ $row->sub_title }}</div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </a>
                    @endforeach

                </div>
            </div>
        @endif

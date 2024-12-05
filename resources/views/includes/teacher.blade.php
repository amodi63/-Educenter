

                <!-- Teacher Container -->
                <div class="col-md-12" id="teacherContainer">
                 

                 
                    @forelse ($teachers as $teacher)
                        <div class="col-lg-4 col-sm-6 mb-5">
                            <div class="card border-0 rounded-0 hover-shadow">
                                <img class="card-img-top rounded-0"
                                    src="{{ asset('uploads/teachers/' . $teacher->image) }}" alt="teacher">
                                <div class="card-body">
                                    <a href="teacher-single.html">
                                        <h4 class="card-title">{{ $teacher->name }}</h4>
                                    </a>
                                    <p>{{ $teacher->major }}</p>
                                    <ul class="list-inline">
                                        <li class="list-inline-item"><a class="text-color" href="#"><i
                                                    class="ti-facebook"></i></a></li>
                                        <li class="list-inline-item"><a class="text-color" href="#"><i
                                                    class="ti-twitter-alt"></i></a></li>
                                        <li class="list-inline-item"><a class="text-color" href="#"><i
                                                    class="ti-google"></i></a></li>
                                        <li class="list-inline-item"><a class="text-color" href="#"><i
                                                    class="ti-linkedin"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        @empty
                        <div class="col-12 text-center">
                            <p class="text-muted">No teachers found in this category.</p>
                        </div>
                    @endforelse

              

              </div>
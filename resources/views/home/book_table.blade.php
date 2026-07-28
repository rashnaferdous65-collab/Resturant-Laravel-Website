<section id="book-table" class="py-5 bg-dark text-white text-center">
    <div class="container py-4">
        <h2 class="display-5 fw-bold mb-4 text-uppercase">Book A Table</h2>
        <p class="text-muted mb-5">Reserve your spot and enjoy an amazing dining experience.</p>

        <form action="{{ url('book_table') }}" method="POST">
            @csrf
            
            <div class="row g-3 mb-4">
                {{-- Phone Input --}}
                <div class="col-12 col-sm-6 col-md-3">
                    <input 
                        type="tel" 
                        name="phone" 
                        class="form-control form-control-lg custom-form-control" 
                        placeholder="Phone Number" 
                        required>
                </div>

                {{-- Guests Input --}}
                <div class="col-12 col-sm-6 col-md-3">
                    <input 
                        type="number" 
                        name="n_guest" 
                        class="form-control form-control-lg custom-form-control" 
                        placeholder="Number of Guests" 
                        min="1" 
                        max="20" 
                        required>
                </div>

                {{-- Time Input --}}
                <div class="col-12 col-sm-6 col-md-3">
                    <input 
                        type="time" 
                        name="time" 
                        class="form-control form-control-lg custom-form-control" 
                        required>
                </div>

                {{-- Date Input --}}
                <div class="col-12 col-sm-6 col-md-3">
                    <input 
                        type="date" 
                        name="date" 
                        class="form-control form-control-lg custom-form-control" 
                        required>
                </div>
            </div>

            {{-- Submit Button --}}
            <button type="submit" class="btn btn-primary btn-lg px-5 rounded-pill shadow-sm">
                Find Table
            </button>
        </form>
    </div>
</section>
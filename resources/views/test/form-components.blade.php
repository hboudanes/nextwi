<x-main-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1 class="text-3xl font-bold text-gray-900 mb-8">Form Components Showcase</h1>
                    
                    <form method="POST" action="#" enctype="multipart/form-data" class="space-y-8">
                        @csrf
                        
                        <!-- Basic Text Inputs -->
                        <div class="bg-gray-50 p-6 rounded-lg">
                            <h2 class="text-xl font-semibold mb-4">Basic Text Inputs</h2>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <x-forms.input-text 
                                    name="first_name" 
                                    label="First Name" 
                                    placeholder="Enter your first name"
                                    required
                                    helpText="This field is required"
                                />
                                
                                <x-forms.input-email 
                                    name="email" 
                                    label="Email Address" 
                                    placeholder="user@example.com"
                                    required
                                />
                                
                                <x-forms.input-tel 
                                    name="phone" 
                                    label="Phone Number" 
                                    placeholder="+1 (555) 123-4567"
                                />
                                
                                <x-forms.input-url 
                                    name="website" 
                                    label="Website" 
                                    placeholder="https://example.com"
                                />
                            </div>
                        </div>
                        
                        <!-- Password Input -->
                        <div class="bg-gray-50 p-6 rounded-lg">
                            <h2 class="text-xl font-semibold mb-4">Password Input</h2>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <x-forms.input-password 
                                    name="password" 
                                    label="Password" 
                                    placeholder="Enter password"
                                    required
                                    :showToggle="true"
                                />
                                
                                <x-forms.input-password 
                                    name="password_confirmation" 
                                    label="Confirm Password" 
                                    placeholder="Confirm password"
                                    required
                                />
                            </div>
                        </div>
                        
                        <!-- Number and Date Inputs -->
                        <div class="bg-gray-50 p-6 rounded-lg">
                            <h2 class="text-xl font-semibold mb-4">Number and Date Inputs</h2>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <x-forms.input-number 
                                    name="age" 
                                    label="Age" 
                                    :min="18" 
                                    :max="100"
                                    placeholder="25"
                                />
                                
                                <x-forms.input-date 
                                    name="birth_date" 
                                    label="Birth Date"
                                />
                                
                                <x-forms.input-datetime 
                                    name="appointment" 
                                    label="Appointment Date & Time"
                                />
                            </div>
                        </div>
                        
                        <!-- Range and Color Inputs -->
                        <div class="bg-gray-50 p-6 rounded-lg">
                            <h2 class="text-xl font-semibold mb-4">Range and Color Inputs</h2>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <x-forms.input-range 
                                    name="volume" 
                                    label="Volume" 
                                    :min="0" 
                                    :max="100"
                                    :value="50"
                                    unit="%"
                                    :showValue="true"
                                />
                                
                                <x-forms.input-color 
                                    name="theme_color" 
                                    label="Theme Color" 
                                    value="#3B82F6"
                                    :showHex="true"
                                    :showPreview="true"
                                />
                            </div>
                        </div>
                        
                        <!-- File Upload -->
                        <div class="bg-gray-50 p-6 rounded-lg">
                            <h2 class="text-xl font-semibold mb-4">File Upload</h2>
                            <x-forms.input-file 
                                name="avatar" 
                                label="Profile Picture" 
                                accept="image/*"
                                :showPreview="true"
                                :dragDrop="true"
                                helpText="Upload a profile picture (JPG, PNG, GIF)"
                            />
                        </div>
                        
                        <!-- Checkboxes and Radio Buttons -->
                        <div class="bg-gray-50 p-6 rounded-lg">
                            <h2 class="text-xl font-semibold mb-4">Checkboxes and Radio Buttons</h2>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <x-forms.input-checkbox 
                                        name="newsletter" 
                                        label="Subscribe to newsletter"
                                        :checked="true"
                                    />
                                    
                                    <x-forms.input-checkbox 
                                        name="terms" 
                                        label="I agree to the terms and conditions"
                                        required
                                    />
                                </div>
                                
                                <div>
                                    <x-forms.input-radio 
                                        name="gender" 
                                        label="Gender"
                                        :options="['male' => 'Male', 'female' => 'Female', 'other' => 'Other']"
                                        value="male"
                                    />
                                </div>
                            </div>
                        </div>
                        
                        <!-- Select Dropdown -->
                        <div class="bg-gray-50 p-6 rounded-lg">
                            <h2 class="text-xl font-semibold mb-4">Select Dropdown</h2>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <x-forms.input-select 
                                    name="country" 
                                    label="Country"
                                    :options="[
                                        'us' => 'United States',
                                        'ca' => 'Canada',
                                        'uk' => 'United Kingdom',
                                        'fr' => 'France',
                                        'de' => 'Germany'
                                    ]"
                                    placeholder="Select your country"
                                />
                                
                                <x-forms.input-select 
                                    name="skills" 
                                    label="Skills"
                                    :options="[
                                        'Frontend' => [
                                            'html' => 'HTML',
                                            'css' => 'CSS',
                                            'js' => 'JavaScript'
                                        ],
                                        'Backend' => [
                                            'php' => 'PHP',
                                            'python' => 'Python',
                                            'node' => 'Node.js'
                                        ]
                                    ]"
                                    :multiple="true"
                                />
                            </div>
                        </div>
                        
                        <!-- Textarea -->
                        <div class="bg-gray-50 p-6 rounded-lg">
                            <h2 class="text-xl font-semibold mb-4">Textarea</h2>
                            <x-forms.input-textarea 
                                name="bio" 
                                label="Biography" 
                                placeholder="Tell us about yourself..."
                                :rows="6"
                                :maxlength="500"
                                :showCharCount="true"
                                :autoResize="true"
                                helpText="Maximum 500 characters"
                            />
                        </div>
                        
                        <!-- Hidden Input -->
                        <x-forms.input-hidden name="form_token" value="abc123" />
                        
                        <!-- Submit Button -->
                        <div class="flex justify-end">
                            <x-primary-button type="submit">
                                Submit Form
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    @push('scripts')
    <script>
        // Form submission handler for demo
        document.querySelector('form').addEventListener('submit', function(e) {
            e.preventDefault();
            alert('Form submitted! (This is just a demo)');
        });
    </script>
    @endpush
</x-main-layout>
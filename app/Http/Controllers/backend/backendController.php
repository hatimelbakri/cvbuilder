<?php

namespace App\Http\Controllers\backend;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Mail\Welcome;
use Illuminate\Http\Request;
use App\Models\Info;
use App\Models\Profile;
use App\Models\skills;
use App\Models\cv;
use App\Models\education;
use App\Models\experience;
use App\Models\language;
use App\Models\level_education;
use App\Models\project;
use App\Models\type_experience;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use PhpParser\Node\Stmt\Return_;
use SebastianBergmann\CodeCoverage\Report\Xml\Project as XmlProject;

class backendController extends Controller
{
    public function Usercv()
    {
        return view('backend.template');
    }

    public function userLogout(Request $request)
    {
        Auth::guard('web')->logout();
        
        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
    // Template
    public function saveTemplate(Request $request)
    {
        cv::insert([
            'user_id' => Auth::user()->id,
            'name' => $request->name,
        ]);
        $notification = array(
            'message' => 'Name of cv saved successfully!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
    
    public function editTemplate(Request $request)
    {
        $cv = cv::where('user_id', Auth::user()->id)->first();
        return view('backend.edittemplate', compact('cv'));
    }

    public function updateTemplate(Request $request)
    {
        $id = $request->id;

        cv::findorFail($id)->update([
            'user_id' => Auth::user()->id,
            'name' => $request->name,
        ]);
        $notification = array(
            'message' => 'name of cv updated successfully!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    // Basic Information
    public function Userinfo()
    {
        return view('backend.basicinfo');
    }
    public function saveInfo(Request $request)
    {
        $cvId = cv::where('user_id', Auth::id())
                  ->latest()
                  ->value('id');

        Info::insert([
            'user_id' => Auth::user()->id,
            'cv_id' => $cvId,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'adress' => $request->adress,
            'city' => $request->city,
            'codepostal' => $request->codepostal,
        ]);
        $notification = array(
            'message' => 'Information saved successfully!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
    
    public function editInfo(Request $request)
    {
        $latestCv = Cv::where('user_id', Auth::id())->latest('id')->first();
        $info = null;
        if ($latestCv) {
            $info = Info::where('user_id', Auth::id())
                        ->where('cv_id', $latestCv->id)
                        ->first();
        }
        return view('backend.editinfo', compact('info'));
    }

    public function updateInfo(Request $request)
    {
        $cvId = $request->filled('cv_id')
            ? $request->cv_id
            : CV::where('user_id', Auth::id())->latest()->value('id');

        $id = $request->id;
        Info::findorFail($id)->update([
            'user_id' => Auth::user()->id,
            'cv_id' => $cvId,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'adress' => $request->adress,
            'city' => $request->city,
            'codepostal' => $request->codepostal,
        ]);
        $notification = array(
            'message' => 'Information updated successfully!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    // User Profile
    public function Userprofile()
    {
        return view('backend.profile');
    }

    public function saveProfile(Request $request)
    {
        $cvId = cv::where('user_id', Auth::id())
                  ->latest()
                  ->value('id');

        Profile::insert([
            'user_id' => Auth::user()->id,
            'cv_id' => $cvId,
            'profile' => $request->profile,
        ]);
        $notification = array(
            'message' => 'Profile saved successfully!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
    public function editProfile(Request $request)
    {
        $latestCv = Cv::where('user_id', Auth::id())->latest('id')->first();
        $profile = null;
        if ($latestCv) {
            $profile = Profile::where('user_id', Auth::id())
                              ->where('cv_id', $latestCv->id)
                              ->first();
        }
        return view('backend.editprofile', compact('profile'));
    }

    public function updateProfile(Request $request)
    {
        $cvId = $request->filled('cv_id')
        ? $request->cv_id
        : CV::where('user_id', Auth::id())->latest()->value('id');

        $id = $request->id;

        Profile::findorFail($id)->update([
            'user_id' => Auth::user()->id,
            'cv_id' => $cvId,
            'profile' => $request->profile,
        ]);
        $notification = array(
            'message' => 'Profile updated successfully!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
    
    // User Education
    public function UserEducation()
    {
        $degree = level_education::get();
        return view('backend.education', compact('degree'));
    }
    public function saveEducation(Request $request)
    {
        // last CV id for current user
        $cvId = $request->cv_id ?? cv::where('user_id', Auth::id())
                                 ->latest()
                                 ->value('id');   // returns null if none
        
        $from = Carbon::createFromFormat('m/d/Y', $request->from_year)->format('Y-m-d');
        $to   = Carbon::createFromFormat('m/d/Y', $request->to_year)->format('Y-m-d');

        education::insert([
            'user_id' => Auth::user()->id,
            'cv_id'   => $cvId,
            'degree'  => $request->degree,
            'name'    => $request->name,
            'specialite'   => $request->specialite,
            'from_year' => $from,
            'to_year' => $to,
        ]);
        $notification = array(
            'message' => 'Education saved successfully!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
    public function listEducation(Request $request)
    {
        // Get the latest CV for the current user
        $latestCv = cv::where('user_id', Auth::id())->latest('id')->first();

        // If a CV exists, fetch the related skills
        if ($latestCv) {
            $educations = education::where('user_id', Auth::id())
                            ->where('cv_id', $latestCv->id)
                            ->get();
        }
        return view('backend.listEducation', compact('educations'));
    }
    public function editEducation($id)
    {
        $degree = level_education::get();

        $education = education::where('id', $id)->first();
        return view('backend.editEducation', compact('education', 'degree'));
    }

    public function updateEducation(Request $request)
    {
        // last CV id for current user
        $cvId = $request->cv_id ?? cv::where('user_id', Auth::id())
                                 ->latest()
                                 ->value('id');   // returns null if none

        $from = Carbon::createFromFormat('m/d/Y', $request->from_year)->format('Y-m-d');
        $to   = Carbon::createFromFormat('m/d/Y', $request->to_year)->format('Y-m-d');
        
        // Update the education record
        education::findorFail($request->id)->update([
            'user_id' => Auth::user()->id,
            'cv_id'   => $cvId,
            'degree'  => $request->degree,
            'name'    => $request->name,
            'specialite'   => $request->specialite,
            'from_year' => $from,
            'to_year' => $to,
        ]);
        $notification = array(
            'message' => 'Education updated successfully!',
            'alert-type' => 'success'
        );
        return redirect()->route('edit.education')->with($notification);
    }
    public function deleteEducation($id)
    {
        // Delete the education record
        education::findorFail($id)->delete();

        $notification = array(
            'message' => 'Education deleted successfully!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    // User Experience
    public function UserExperience()
    {
        $type = type_experience::get();
        return view('backend.experience', compact('type'));
    }
    public function saveExperience(Request $request)
    {
        // Get the last CV ID for the current user
        $cvId = $request->cv_id ?? cv::where('user_id', Auth::id())
                                ->latest()
                                ->value('id');   // null if none

        // Convert start and end dates (optional end_date if position is current)
        $start = Carbon::createFromFormat('m/d/Y', $request->start_date)->format('Y-m-d');

        // Only parse end date if it's provided and not a current position
        $end = null;
        if ($request->filled('end_date') && !$request->current_position) {
            $end = Carbon::createFromFormat('m/d/Y', $request->end_date)->format('Y-m-d');
        }

        // Insert experience record
        experience::insert([
            'user_id'           => Auth::id(),
            'cv_id'             => $cvId,
            'name'              => $request->name,
            'company_name'      => $request->company_name,
            'type_employment'   => $request->type_employment,
            'description'       => $request->description,
            'start_date'        => $start,
            'end_date'          => $end,
            'current_position'  => $request->current_position ? true : false,
        ]);

        $notification = [
            'message' => 'Experience saved successfully!',
            'alert-type' => 'success',
        ];

        return redirect()->back()->with($notification);
    }
    public function listExperience(Request $request)
    {
        // Get the latest CV for the current user
        $latestCv = cv::where('user_id', Auth::id())->latest('id')->first();

        // If a CV exists, fetch the related skills
        if ($latestCv) {
            $experiences = experience::where('user_id', Auth::id())
                            ->where('cv_id', $latestCv->id)
                            ->get();
        }
        return view('backend.listExperience', compact('experiences'));
    }
    public function editExperience($id)
    {
        $type = type_experience::get();

        $exper = experience::where('id', $id)->first();
        return view('backend.editExperience', compact('exper', 'type'));
    }

    public function updateExperience(Request $request)
    {
        // Get the last CV ID for the current user
        $cvId = $request->cv_id ?? cv::where('user_id', Auth::id())
                                ->latest()
                                ->value('id');   // null if none

        // Convert start and end dates (optional end_date if position is current)
        $start = Carbon::createFromFormat('m/d/Y', $request->start_date)->format('Y-m-d');

        // Only parse end date if it's provided and not a current position
        $end = null;
        if ($request->filled('end_date') && !$request->current_position) {
            $end = Carbon::createFromFormat('m/d/Y', $request->end_date)->format('Y-m-d');
        }

        // Update the experience record
        experience::findorFail($request->id)->update([
            'user_id'           => Auth::id(),
            'cv_id'             => $cvId,
            'name'              => $request->name,
            'company_name'      => $request->company_name,
            'type_employment'   => $request->type_employment,
            'description'       => $request->description,
            'start_date'        => $start,
            'end_date'          => $end,
            'current_position'  => $request->current_position ? true : false,
        ]);

        $notification = [
            'message' => 'Experience updated successfully!',
            'alert-type' => 'success',
        ];

        return redirect()->route('edit.experience')->with($notification);
    }
    public function deleteExperience($id)
    {
        // Delete the experience record
        experience::findorFail($id)->delete();

        $notification = array(
            'message' => 'Experience deleted successfully!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    // User Skills
    public function UserSkills()
    {
        return view('backend.skills');
    }
    public function saveSkills(Request $request)
    {
        // last CV id for current user
        $cvId = $request->cv_id ?? cv::where('user_id', Auth::id())
                                 ->latest()
                                 ->value('id');   // returns null if none
        
        foreach ($request->skills as $skill) {
            Skills::insert([
                'user_id' => Auth::user()->id,
                'cv_id'   => $cvId,
                'name'    => $skill['name'],
                'level'   => $skill['level'],
            ]);
        }
        $notification = array(
            'message' => 'All Skills saved successfully!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
    public function editSkills(Request $request)
    {
        // Get the latest CV for the current user
        $latestCv = cv::where('user_id', Auth::id())->latest('id')->first();

        // Initialize an empty collection
        $skills = collect();

        // If a CV exists, fetch the related skills
        if ($latestCv) {
            $skills = Skills::where('user_id', Auth::id())
                            ->where('cv_id', $latestCv->id)
                            ->get();
        }

        return view('backend.editSkills', compact('skills'));
    }
    public function updateSkills(Request $request)
    {
        /* 1. CV id (form value or newest CV) */
        $cvId = $request->cv_id ?? CV::where('user_id', Auth::id())
                                    ->latest()
                                    ->value('id');

        /* 2. update or create remaining skills */
        if ($request->filled('skills')) {
            foreach ($request->skills as $skillData) {
                Skills::updateOrCreate(
                    ['id' => $skillData['id'], 'user_id' => Auth::id()],
                    ['cv_id' => $cvId,'name' => $skillData['name'], 'level' => $skillData['level']]
                );
            }
        }

        // 3. delete skills that were removed in the UI
        if ($request->filled('deleted_ids')) {
            Skills::where('user_id', Auth::id())
                ->whereIn('id', $request->deleted_ids)
                ->delete();
        }

        $notification = array(
            'message' => 'Skills updated successfully!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
    
    // User Language
    public function UserLanguage()
    {
        return view('backend.language');
    }
    public function saveLanguage(Request $request)
    {
        // Get the latest CV ID for the authenticated user
        $cvId = $request->cv_id ?? Cv::where('user_id', Auth::id())
                                    ->latest()
                                    ->value('id');   // returns null if none

        // Loop through all submitted languages
        foreach ($request->languages as $lang) {
            language::insert([
                'user_id'     => Auth::id(),
                'cv_id'       => $cvId,
                'language'    => $lang['language'],
                'proficiency' => $lang['proficiency'],
            ]);
        }

        // Notification
        $notification = [
            'message'    => 'Languages saved successfully!',
            'alert-type' => 'success',
        ];

        return redirect()->back()->with($notification);
    }

    public function editLanguage(Request $request)
    {
        // Get the latest CV for the current user
        $latestCv = cv::where('user_id', Auth::id())->latest('id')->first();

        // Initialize an empty collection
        $languages = collect();

        // If a CV exists, fetch the related skills
        if ($latestCv) {
            $languages = language::where('user_id', Auth::id())
                            ->where('cv_id', $latestCv->id)
                            ->get();
        }

        return view('backend.editLanguage', compact('languages'));
    }
    public function updateLanguage(Request $request)
    {
        // 1. Get latest CV ID for current user if not passed
        $cvId = $request->cv_id ?? CV::where('user_id', Auth::id())
                                    ->latest()
                                    ->value('id');

        // 2. Update or create languages
        if ($request->filled('languages')) {
            foreach ($request->languages as $langData) {
                \App\Models\Language::updateOrCreate(
                    ['id' => $langData['id'] ?? null, 'user_id' => Auth::id()],
                    [
                        'cv_id'       => $cvId,
                        'language'    => $langData['name'],         // Use 'name' as in the form
                        'proficiency' => $langData['proficiency'],
                    ]
                );
            }
        }

        // 3. Delete languages that were removed
        if ($request->filled('deleted_ids')) {
            language::where('user_id', Auth::id())
                ->whereIn('id', $request->deleted_ids)
                ->delete();
        }

        // 4. Redirect with success message
        return redirect()->back()->with([
            'message'    => 'Languages updated successfully!',
            'alert-type' => 'success',
        ]);
    }

    // User image
    public function UserImage()
    {
        return view('backend.userimage');
    }
    public function saveImage(Request $request)
    {
        // 1. Validate image input (type and max size = 2 MB)
        $request->validate([
            'image' => 'required|image|mimes:jpg,jpeg,png,webp,gif|max:2048',
        ]);

        // 2. Current user
        $user = Auth::user();
        if (!$user) {
            return redirect()->route('login')->with('error', 'Please login first.');
        }

        // 3. Latest cv_id in cvs table
        $cvId = cv::latest('id')->value('id');
        if (!$cvId) {
            return back()->with('error', 'No CV found. Please create a CV first.');
        }

        // 4. Info row for this cv_id
        $info = Info::updateOrCreate(
            ['cv_id' => $cvId],
            ['user_id' => $user->id]
        );

        // 5. Build filename: {slug-of-name}_{cvId}.{ext}
        $image   = $request->file('image');
        $ext     = $image->getClientOriginalExtension();

        // Fallback to ‘profile’ if no name yet
        $base    = Str::slug($info->name ?? 'profile');
        $fileName = "{$base}_{$cvId}.{$ext}";
        $filePath = "profile/{$fileName}";

        // 6. Delete old image if it exists
        if ($info->image && Storage::disk('public')->exists("upload/{$info->image}")) {
            Storage::disk('public')->delete("upload/{$info->image}");
        }

        // 7. Save new image
        Storage::disk('public')->putFileAs("upload/profile", $image, $fileName);

        // 8. Update image path
        $info->image = $filePath;
        $info->save();

        // 9. Success flash
        return redirect()->back()->with([
            'message'    => 'Profile image uploaded successfully!',
            'alert-type' => 'success',
        ]);
    }

    public function editImage(Request $request)
    {
        // Get the latest CV for the current user
        $latestCv = CV::where('user_id', Auth::id())->latest('id')->first();

        // If a CV exists, fetch the related info and set cvId
        if ($latestCv) {
            $cvId = $latestCv->id;
            $info = Info::where('user_id', Auth::id())
                        ->where('cv_id', $cvId)
                        ->first();
        }

        return view('backend.editImage', compact('info'));
    }

    public function updateImage(Request $request)
    {
        // Validate image input (type and max size = 2 MB)
        $request->validate([
            'image' => 'required|image|mimes:jpg,jpeg,png,webp,gif|max:2048',
        ]);

        // Current user
        $user = Auth::user();
        if (!$user) {
            return redirect()->route('login')->with('error', 'Please login first.');
        }

        // Latest cv_id in cvs table
        $cvId = CV::latest('id')->value('id');
        if (!$cvId) {
            return back()->with('error', 'No CV found. Please create a CV first.');
        }

        // Info row for this cv_id
        $info = Info::updateOrCreate(
            ['cv_id' => $cvId],
            ['user_id' => $user->id]
        );

        // Build filename: {slug-of-name}_{cvId}.{ext}
        $image   = $request->file('image');
        $ext     = $image->getClientOriginalExtension();

        // Fallback to ‘profile’ if no name yet
        $base    = Str::slug($info->name ?? 'profile');
        $fileName = "{$base}_{$cvId}.{$ext}";
        $filePath = "profile/{$fileName}";

        // Delete old image if it exists
        if ($info->image && Storage::disk('public')->exists("upload/{$info->image}")) {
            Storage::disk('public')->delete("upload/{$info->image}");
        }

        // Save new image
        Storage::disk('public')->putFileAs("upload/profile", $image, $fileName);

        // Update image path
        $info->image = $filePath;
        $info->save();

        // Success flash
        return redirect()->back()->with([
            'message'    => 'Profile image updated successfully!',
            'alert-type' => 'success',
        ]);
    }

    //User Project
    public function UserProject()
    {
        return view('backend.project');
    }

    public function saveProject(Request $request)
    {
        // 1. Validate input
        $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'nullable|string',
            'url'         => 'required|file|max:5120', // Max 5MB
        ]);

        // 2. Get last CV ID for current user
        $cvId = $request->cv_id ?? CV::where('user_id', Auth::id())->latest()->value('id');

        if (!$cvId) {
            return back()->with([
                'message'    => 'No CV found. Please create a CV first.',
                'alert-type' => 'error',
            ]);
        }

        // 3. Create project without URL first (so we get the ID)
        $project = Project::create([
            'user_id'     => Auth::id(),
            'cv_id'       => $cvId,
            'title'       => $request->title,
            'url'         => '', // temporary placeholder
            'description' => $request->description,
        ]);

        // 4. Generate filename now that we have project ID
        $file      = $request->file('url');
        $extension = $file->getClientOriginalExtension();
        $base      = Str::slug($request->title);
        $filename  = "project_name{$base}_cv{$cvId}_user" . Auth::id() . "_id{$project->id}." . $extension;
        $filePath  = "projects/{$filename}";

        // 5. Store file in storage/app/public/upload/projects
        Storage::disk('public')->putFileAs('upload/projects', $file, $filename);

        // 6. Update project with real file path
        $project->update(['url' => $filePath]);

        // 7. Redirect with success message
        return redirect()->back()->with([
            'message'    => 'Project uploaded successfully!',
            'alert-type' => 'success',
        ]);
    }
    
    public function listProject(Request $request)
    {
        // Get the latest CV for the current user
        $latestCv = cv::where('user_id', Auth::id())->latest('id')->first();

        // If a CV exists, fetch the related skills
        if ($latestCv) {
            $projects = project::where('user_id', Auth::id())
                            ->where('cv_id', $latestCv->id)
                            ->get();
        }
        return view('backend.listProject', compact('projects'));
    }

    public function editProject($id)
    {
        // Retrieve the project or abort 404 if not found
        $project = project::findOrFail($id);
        return view('backend.editproject', compact('project'));
    }

    public function updateProject(Request $request)
    {
        // Validate input
        $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'nullable|string',
            'url'         => 'nullable|file|max:5120', // Max 5MB
        ]);

        // Find the project by ID
        $project = project::findOrFail($request->id);

        // Update project details
        $project->update([
            'title'       => $request->title,
            'description' => $request->description,
        ]);

        // If a new file is uploaded, handle it
        if ($request->hasFile('url')) {
            // Generate filename
            $file      = $request->file('url');
            $extension = $file->getClientOriginalExtension();
            $base      = Str::slug($request->title);
            $filename  = "project_name{$base}_cv{$project->cv_id}_user" . Auth::id() . "_id{$project->id}." . $extension;
            $filePath  = "projects/{$filename}";

            // Store file in storage/app/public/upload/projects
            Storage::disk('public')->putFileAs('upload/projects', $file, $filename);

            // Update project with new file path
            $project->update(['url' => $filePath]);
        }

        // Redirect with success message
        return redirect()->route('edit.projects')->with([
            'message'    => 'Project updated successfully!',
            'alert-type' => 'success',
        ]);
    }
    public function deleteProject($id)
    {
        // Find the project by ID
        $project = project::findOrFail($id);

        // Delete the project
        $project->delete();

        // Redirect with success message
        return redirect()->back()->with([
            'message'    => 'Project deleted successfully!',
            'alert-type' => 'success',
        ]);
    }

    public function cv()
    {
        // 1. Latest CV for the logged-in user
        $cv = CV::where('user_id', Auth::id())->latest('id')->first();

        if (!$cv) {
            return back()->with('error', 'Please create a CV first.');
        }

        // 2. Info (profile block) + all other sections
        $template    = $cv->name;
        $info        = Info::where('user_id', Auth::id())->where('cv_id', $cv->id)->first();
        $educations  = education::where('cv_id', $cv->id)->get();
        $experiences = experience::where('cv_id', $cv->id)->get();
        $projects    = project::where('cv_id', $cv->id)->get();
        $skills      = skills::where('cv_id', $cv->id)->get();
        $languages   = language::where('cv_id', $cv->id)->get();
        $profile     = Profile::where('cv_id', $cv->id)->first();

        return view('backend.cv', compact(
            'cv', 'template', 'info', 'educations', 'experiences', 'projects', 'skills', 'languages', 'profile'
        ));
    }
    public function downloadCv()
    {
        // Get the latest CV for the logged-in user
        $cv = cv::where('user_id', Auth::id())->latest('id')->first();

        if (!$cv) {
            return back()->with('error', 'Please create a CV first.');
        }

        // Fetch related info
        $info = Info::where('user_id', Auth::id())
                    ->where('cv_id', $cv->id)
                    ->first();

        $educations = education::where('cv_id', $cv->id)->get();
        $experiences = experience::where('cv_id', $cv->id)->get();
        $skills = skills::where('cv_id', $cv->id)->get();
        $profile = Profile::where('cv_id', $cv->id)->first();
        $languages = language::where('cv_id', $cv->id)->get();
        $projects = project::where('cv_id', $cv->id)->get();

        // Load the PDF with all required data
        $pdf = Pdf::loadView('backend.getcv', compact('cv', 'info', 'educations', 'experiences', 'profile', 'languages', 'projects' , 'skills'))
                ->setPaper('a4')
                ->setOptions([
                    'tempdir' => storage_path('app/public/download'),
                    'chroot' => storage_path(),
                    'isHtml5ParserEnabled' => true,
                    'isRemoteEnabled' => true,
                ]);

        return $pdf->download("CV_{$cv->name}.pdf");
    }
    public function sendEmail() {
        Mail::to('hatbak95@gmail.com')->send(new Welcome);
    }    
    
}

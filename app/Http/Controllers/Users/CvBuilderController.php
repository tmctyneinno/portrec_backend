<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Base\BaseController;
use App\Interfaces\Users\FileUploadServiceInterface;
use App\Services\Users\CvBuilderService;
use Illuminate\Http\Request;

class CvBuilderController extends BaseController
{
    public function __construct(
        public readonly CvBuilderService $cvBuilderService,
        public readonly FileUploadServiceInterface $fileUploadService,
    ) {
    }

    public function fromProfile(Request $request)
    {
        $pdf = $this->cvBuilderService->buildCvFromProfile();
        return $pdf->download(auth()->user()->name . '.pdf');
    }

    public function fromCv(Request $request)
    {
        $file = null;


        if ($request->hasFile('resume')) {
            $file = $this->fileUploadService->upload($request->file('resume'), 'resumes');
        }


        $data = $this->cvBuilderService->buildProfileFromCv($file);

        return $this->successMessage($data);
    }

    public function upload(Request $request)
    {
        
    }
}

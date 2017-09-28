<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateOrganizationRequest;
use App\Http\Requests\UpdateOrganizationRequest;
use App\Repositories\OrganizationRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use  Spatie\Tags\Tag;

class OrganizationController extends AppBaseController
{
    /** @var  OrganizationRepository */
    private $organizationRepository;

    public function __construct(OrganizationRepository $organizationRepo)
    {
        $this->organizationRepository = $organizationRepo;
    }

    /**
     * Display a listing of the Organization.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->organizationRepository->pushCriteria(new RequestCriteria($request));
        $organizations = $this->organizationRepository->all();

        return view('organizations.index')
            ->with('organizations', $organizations);
    }

    /**
     * Show the form for creating a new Organization.
     *
     * @return Response
     */
    public function create()
    {
        return view('organizations.create');
    }

    /**
     * Store a newly created Organization in storage.
     *
     * @param CreateOrganizationRequest $request
     *
     * @return Response
     */
    public function store(CreateOrganizationRequest $request)
    {
        $input = $request->all();

        $organization = $this->organizationRepository->create($input);

        $organization->syncTagsWithType([$request->orgType], 'orgType');
        $organization->syncTagsWithType([$request->color1],'orgColor1');
        $organization->syncTagsWithType([$request->color2],'orgColor2');
        $organization->syncTagsWithType([$request->color3],'orgColor3');
        $organization->syncTagsWithType([$request->orgSubType], 'orgSubType');

        Flash::success('Organization saved successfully.');

        return redirect(route('organizations.index'));
    }

    /**
     * Display the specified Organization.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $organization = $this->organizationRepository->findWithoutFail($id);

        if (empty($organization)) {
            Flash::error('Organization not found');

            return redirect(route('organizations.index'));
        }

        return view('organizations.show')->with('organization', $organization);
    }

    /**
     * Show the form for editing the specified Organization.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $organization = $this->organizationRepository->findWithoutFail($id);
        $type = $organization->tagsWithType('orgType')->first();
        $subType = $organization->tagsWithType('orgSubType')->first();
        $color1 = $organization->tagsWithType('orgColor1')->first();
        $color2 = $organization->tagsWithType('orgColor2')->first();
        $color3 = $organization->tagsWithType('orgColor3')->first();

        if (empty($organization)) {
            Flash::error('Organization not found');

            return redirect(route('organizations.index'));
        }

        return view('organizations.edit', compact('organization', 'type', 'color1', 'color2', 'color3', 'subType'));
    }

    /**
     * Update the specified Organization in storage.
     *
     * @param  int              $id
     * @param UpdateOrganizationRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateOrganizationRequest $request)
    {
        $organization = $this->organizationRepository->findWithoutFail($id);

        if (empty($organization)) {
            Flash::error('Organization not found');

            return redirect(route('organizations.index'));
        }

        $organization = $this->organizationRepository->update($request->all(), $id);

      //  $organization->syncTags(['foo' => 'tag1', 'tag2']);
        $organization->syncTagsWithType([$request->orgType], 'orgType');
        $organization->syncTagsWithType([$request->color1],'orgColor1');
        $organization->syncTagsWithType([$request->color2],'orgColor2');
        $organization->syncTagsWithType([$request->color3],'orgColor3');
        $organization->syncTagsWithType([$request->orgSubType], 'orgSubType');


        Flash::success('Organization updated successfully.');

        return redirect(route('organizations.index'));
    }

    /**
     * Remove the specified Organization from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $organization = $this->organizationRepository->findWithoutFail($id);

        if (empty($organization)) {
            Flash::error('Organization not found');

            return redirect(route('organizations.index'));
        }

        $this->organizationRepository->delete($id);

        Flash::success('Organization deleted successfully.');

        return redirect(route('organizations.index'));
    }
}

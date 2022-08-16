<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Campaign;
use Auth;
use Illuminate\Http\Request;
use Validator;

class CampaignsController extends Controller
{
    //
    public function index()
    {
        $campaigns = Campaign::where([['user_id', '=', Auth::user()->id], ['status_type', '=', 3], ['is_active', '=', 1], ['is_delete', '=', 0], ['is_revisions', '=', 0], ['is_payment', '=', 1]])->orderBy('id', 'DESC')->get();
        return view('Frontend/campaign/campaigns-confirmed', compact('campaigns'));
    }

    public function campaigns_creator()
    {
        return view('Frontend/campaign/campaigns-creator');
    }

    public function campaigns_creator_submit(Request $request)
    {

        $rules = [
            'champing_id' => 'required | unique:campaigns,champing_id',
            'champing_title' => 'required',
            'champing_desc' => 'required',
            'offers_data' => 'required',
            'highlights_data' => 'required',
            'team_data' => 'required',
            'board_data' => 'required',
            'officers_data' => 'required',
            'voting_data' => 'required',
            'risk_data' => 'required',
            'fundraising_data' => 'required',
            'debt_amount' => 'required',
            'debt_interest_rate' => 'required',
            'loan_count' => 'required',
            'financial_officer' => 'required',
            'transactions_data' => 'required',
            'questions_data' => 'required',
            'discussion_data' => 'required',
        ];
        $customs = [
            'champing_id.required' => 'The Campaign ID field is required.',
            'champing_id.unique' => 'Campaign ID alredy exist.',
            'champing_title.required' => 'The Campaign Title  field is required.',
            'champing_desc.required' => 'The Campaign Description field is required.',
            'offers_data.required' => 'The Campaign Offerings field is required.',
            'highlights_data.required' => 'The Company Highlights field is required.',
            'team_data.required' => 'The Company Team Memebers field is required.',
            'board_data.required' => 'The Company Board Member field is required.',
            'officers_data.required' => 'The Company Officers field is required.',
            'voting_data.required' => 'The Voting Power field is required.',
            'risk_data.required' => 'The Investor Risks field is required.',
            'fundraising_data.required' => 'The Use Of Fundraising field is required.',
            'transactions_data.required' => 'The Related Party Transactions field is required.',
            'questions_data.required' => 'The Frequently Asked Questions field is required.',
            'discussion_data.required' => 'The Discussion Topics field is required.',
            'debt_amount.required' => 'The Debt Amount field is required.',
            'debt_interest_rate.required' => 'The Debt Interest Rate field is required.',
            'loan_count.required' => 'The Loan Count field is required.',
            'financial_officer.required' => 'The Chief Financial Officer field is required.',
        ];
        $validation = Validator::make($request->all(), $rules, $customs);

        if ($validation->fails()) {
            $data['status'] = false;
            $data['msg'] = $validation->errors()->first();
            echo json_encode($data);
            exit();
        }

        $data = $request->input();
        $data_insert = new Campaign;
        $data_insert->champing_id = $data['champing_id'];
        $data_insert->campaign_title = $data['champing_title'];
        $data_insert->campaign_desc = $data['champing_desc'];
        // $data_insert->investment_terms = $data['offers_data';
        $data_insert->campaign_offerings = $data['offers_data'];
        $data_insert->campaign_highlights = $data['highlights_data'];
        $data_insert->team_member = $data['team_data'];
        $data_insert->board_member = $data['board_data'];
        $data_insert->officer_member = $data['officers_data'];
        $data_insert->voting_power = $data['voting_data'];
        $data_insert->investor_risks = $data['risk_data'];
        // $data_insert->previous_fundraising = ;
        $data_insert->use_of_fundraising = $data['fundraising_data'];
        $data_insert->debt_amount = $data['debt_amount'];
        $data_insert->debt_interest_rate = $data['debt_interest_rate'];
        $data_insert->loan_count = $data['loan_count'];
        $data_insert->chief_financial_officer = $data['financial_officer'];
        $data_insert->party_transactions = $data['transactions_data'];
        $data_insert->assets_structure_showcase = $data['asset_data'];
        $data_insert->debts_structure_showcase = $data['debt_data'];
        $data_insert->equity_structure_showcase = $data['equity_data'];
        $data_insert->asked_questions = $data['questions_data'];
        $data_insert->discussion_topics = $data['discussion_data'];
        $data_insert->status_type = 1;
        $data_insert->save();
        $insert_id = $data_insert->id;
        if ($insert_id) {
            $result['status'] = 1;
            $result['msg'] = "Campaign Save Successfully";
            $result['redirect'] = route('campaigns-review');
            $result['id'] = $insert_id;
        }
        echo json_encode($result);
        exit();
    }

    public function campaigns_review()
    {
        $campaigns = Campaign::where([['user_id', '=', Auth::user()->id], ['status_type', '=', 1], ['is_active', '=', 1], ['is_delete', '=', 0]])->orderBy('id', 'DESC')->get();

        if ($campaigns->isEmpty()) {
            return redirect()->route('campaigns-creator');
        }
        return view('Frontend/campaign/campaigns-review', compact('campaigns'));
    }

    public function get_review(Request $request)
    {

        $campaigns = Campaign::where([['user_id', '=', Auth::user()->id], ['champing_id', '=', $request->id]])->first();
        if (!empty($campaigns)) {
            $result['status'] = 1;
            $result['data'] = $campaigns;
        } else {
            $result['status'] = 0;
            $result['msg'] = "No review detail's found.";
        }

        echo json_encode($result);
        exit();
    }

    public function campaigns_review_editor()
    {
        return view('Frontend/campaign/campaigns-review-editor');
    }

    public function campaigns_revisions()
    {
        $campaigns = Campaign::where([['user_id', '=', Auth::user()->id], ['status_type', '=', 2], ['is_active', '=', 1], ['is_delete', '=', 0], ['is_revisions', '=', 1], ['is_payment', '=', 0]])->orderBy('id', 'DESC')->get();
        return view('Frontend/campaign/campaigns-revisions-needed', compact('campaigns'));
    }
    
    public function campaigns_revisions_submit(Request $request)
    {

        $rules = [
            'champing_title' => 'required',
            'champing_desc' => 'required',
            'offers_data' => 'required',
            'highlights_data' => 'required',
            'team_data' => 'required',
            'board_data' => 'required',
            'officers_data' => 'required',
            'voting_data' => 'required',
            'risk_data' => 'required',
            'fundraising_data' => 'required',
            'debt_amount' => 'required',
            'debt_interest_rate' => 'required',
            'loan_count' => 'required',
            'financial_officer' => 'required',
            'transactions_data' => 'required',
            'questions_data' => 'required',
            'discussion_data' => 'required',
        ];
        $customs = [
            'champing_id.unique' => 'Campaign ID alredy exist.',
            'champing_title.required' => 'The Campaign Title  field is required.',
            'champing_desc.required' => 'The Campaign Description field is required.',
            'offers_data.required' => 'The Campaign Offerings field is required.',
            'highlights_data.required' => 'The Company Highlights field is required.',
            'team_data.required' => 'The Company Team Memebers field is required.',
            'board_data.required' => 'The Company Board Member field is required.',
            'officers_data.required' => 'The Company Officers field is required.',
            'voting_data.required' => 'The Voting Power field is required.',
            'risk_data.required' => 'The Investor Risks field is required.',
            'fundraising_data.required' => 'The Use Of Fundraising field is required.',
            'transactions_data.required' => 'The Related Party Transactions field is required.',
            'questions_data.required' => 'The Frequently Asked Questions field is required.',
            'discussion_data.required' => 'The Discussion Topics field is required.',
            'debt_amount.required' => 'The Debt Amount field is required.',
            'debt_interest_rate.required' => 'The Debt Interest Rate field is required.',
            'loan_count.required' => 'The Loan Count field is required.',
            'financial_officer.required' => 'The Chief Financial Officer field is required.',
        ];
        $validation = Validator::make($request->all(), $rules, $customs);

        if ($validation->fails()) {
            $data['status'] = false;
            $data['msg'] = $validation->errors()->first();
            echo json_encode($data);
            exit();
        }

        $data = $request->input();
        $data_insert = Campaign::where('champing_id',$data['champing_id'])->first();
        $data_insert->campaign_title = $data['champing_title'];
        $data_insert->campaign_desc = $data['champing_desc'];
        // $data_insert->investment_terms = $data['offers_data';
        $data_insert->campaign_offerings = $data['offers_data'];
        $data_insert->campaign_highlights = $data['highlights_data'];
        $data_insert->team_member = $data['team_data'];
        $data_insert->board_member = $data['board_data'];
        $data_insert->officer_member = $data['officers_data'];
        $data_insert->voting_power = $data['voting_data'];
        $data_insert->investor_risks = $data['risk_data'];
        // $data_insert->previous_fundraising = ;
        $data_insert->use_of_fundraising = $data['fundraising_data'];
        $data_insert->debt_amount = $data['debt_amount'];
        $data_insert->debt_interest_rate = $data['debt_interest_rate'];
        $data_insert->loan_count = $data['loan_count'];
        $data_insert->chief_financial_officer = $data['financial_officer'];
        $data_insert->party_transactions = $data['transactions_data'];
        $data_insert->assets_structure_showcase = $data['asset_data'];
        $data_insert->debts_structure_showcase = $data['debt_data'];
        $data_insert->equity_structure_showcase = $data['equity_data'];
        $data_insert->asked_questions = $data['questions_data'];
        $data_insert->discussion_topics = $data['discussion_data'];
        $data_insert->status_type = 1;
        $data_insert->save();
        $result['status'] = 1;
        $result['msg'] = "Campaign Update Successfully";
        $result['reload'] = true;
        echo json_encode($result);
        exit();
    }

}
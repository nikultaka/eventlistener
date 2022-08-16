<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    protected $primaryKey = 'id';
    protected $table = 'campaigns';
    protected $fillable = [
         'campaign_title', 
         'campaign_desc', 
         'investment_terms', 
         'campaign_offerings',
         'campaign_highlights',
         'team_member',
         'board_member',
         'officer_member',
         'voting_power',
         'investor_risks',
         'previous_fundraising',
         'use_of_fundraising',
         'debt_amount',
         'debt_amount',
         'loan_count',
         'chief_financial_officer',
         'party_transactions',
         'assets_structure_showcase',
         'debts_structure_showcase',
         'equity_structure_showcase',
         'asked_questions',
         'discussion_topics',
         'is_active',
         'is_delete',
         'status_type',
         'created_at',
         'updated_at',
       ];
}
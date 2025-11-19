<?php
// database/migrations/xxxx_create_bookings_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->string('booking_reference')->unique(); // BK-2025-001
            $table->unsignedBigInteger('user_id'); // Customer
            $table->unsignedBigInteger('partner_id')->nullable(); // Travel Partner
            
            // Flight Route Information
            $table->string('origin_code', 3); // NYC
            $table->string('destination_code', 3); // LAX
            $table->string('origin_city')->nullable(); // New York
            $table->string('destination_city')->nullable(); // Los Angeles
            $table->enum('route_type', ['non-stop', '1-stop', '2-stops', 'multi-stop'])->default('non-stop');
            
            // Flight Details
            $table->string('flight_number'); // AA 1234
            $table->string('airline_name'); // American Airlines
            $table->string('airline_code', 3)->nullable(); // AA
            $table->string('aircraft_type')->nullable(); // Boeing 737
            
            // Travel Dates and Times
            $table->date('departure_date');
            $table->time('departure_time');
            $table->date('arrival_date');
            $table->time('arrival_time');
            $table->integer('flight_duration')->nullable(); // in minutes
            
            // Passenger Information
            $table->integer('adults_count')->default(1);
            $table->integer('children_count')->default(0);
            $table->integer('infants_count')->default(0);
            $table->integer('total_passengers')->default(1);
            $table->json('passengers_details')->nullable(); // Array of passenger info
            
            // Booking Details
            $table->enum('cabin_class', ['economy', 'premium-economy', 'business', 'first'])->default('economy');
            $table->enum('trip_type', ['one-way', 'round-trip', 'multi-city'])->default('one-way');
            
            // Pricing
            $table->decimal('base_amount', 10, 2);
            $table->decimal('taxes_amount', 10, 2)->default(0);
            $table->decimal('fees_amount', 10, 2)->default(0);
            $table->decimal('total_amount', 10, 2);
            $table->string('currency', 3)->default('USD');
            $table->decimal('commission_amount', 10, 2)->default(0);
            $table->decimal('commission_rate', 5, 2)->default(0);
            
            // Payment Information
            $table->enum('payment_status', ['pending', 'paid', 'partial', 'failed', 'refunded'])->default('pending');
            $table->string('payment_method')->nullable(); // credit_card, paypal, etc.
            $table->string('payment_reference')->nullable();
            $table->timestamp('payment_date')->nullable();
            
            // Booking Status
            $table->enum('status', ['pending', 'confirmed', 'cancelled', 'refunded', 'expired', 'completed'])->default('pending');
            $table->enum('confirmation_status', ['pending', 'confirmed', 'failed'])->default('pending');
            $table->string('pnr_number')->nullable(); // Passenger Name Record
            $table->string('ticket_number')->nullable();
            
            // Additional Information
            $table->text('special_requests')->nullable();
            $table->json('baggage_info')->nullable();
            $table->json('seat_preferences')->nullable();
            $table->json('meal_preferences')->nullable();
            
            // API and Integration
            $table->string('booking_source')->default('website'); // website, api, mobile_app
            $table->json('api_response')->nullable(); // Store API response
            $table->string('external_booking_id')->nullable(); // Partner's booking ID
            
            // Timestamps and Tracking
            $table->timestamp('booked_at')->nullable();
            $table->timestamp('confirmed_at')->nullable();
            $table->timestamp('cancelled_at')->nullable();
            $table->timestamp('refunded_at')->nullable();
            $table->text('cancellation_reason')->nullable();
            $table->text('refund_reason')->nullable();
            
            // Admin Notes
            $table->text('admin_notes')->nullable();
            $table->text('customer_notes')->nullable();
            
            // Tracking
            $table->string('ip_address')->nullable();
            $table->string('user_agent')->nullable();
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            
            $table->timestamps();
            
            // Indexes
            $table->index('booking_reference');
            $table->index('user_id');
            $table->index('partner_id');
            $table->index('status');
            $table->index('payment_status');
            $table->index('departure_date');
            $table->index('booked_at');
            $table->index(['status', 'departure_date']);
            $table->index(['user_id', 'status']);
            $table->index(['origin_code', 'destination_code']);
            
            // Foreign keys
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('partner_id')->references('id')->on('travel_partners')->onDelete('set null');
            $table->foreign('created_by')->references('id')->on('users')->onDelete('set null');
            $table->foreign('updated_by')->references('id')->on('users')->onDelete('set null');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
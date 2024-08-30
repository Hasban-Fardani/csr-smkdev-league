<?php

namespace App\Notifications;

use App\Models\Report;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\BroadcastMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Log;

class ReportStatusChangedNotification extends Notification implements ShouldQueue
{
    use Queueable;

    protected $report;
    protected $status;

    public function __construct(Report $report, string $status)
    {
        $this->report = $report;
        $this->status = $status;
    }

    public function via($notifiable): array
    {
        return ['database', 'broadcast'];
    }

    public function toArray($notifiable): array
    {
        return [
            'report_id' => $this->report->id,
            'status' => $this->status,
            'message' => $this->getStatusMessage(),
        ];
    }

    public function toBroadcast($notifiable): BroadcastMessage
    {
        Log::info("Sending message: " . $this->getStatusMessage());
        return new BroadcastMessage([
            'report_id' => $this->report->id,
            'status' => $this->status,
            'message' => $this->getStatusMessage(),
        ]);
    }

    private function getStatusMessage(): string
    {
        return match ($this->status) {
            'revisi' => 'Laporan Anda memerlukan revisi.',
            'diterima' => 'Laporan Anda telah diterima.',
            'ditolak' => 'Laporan Anda telah ditolak.',
            default => 'Status laporan Anda telah diperbarui.',
        };
    }
}

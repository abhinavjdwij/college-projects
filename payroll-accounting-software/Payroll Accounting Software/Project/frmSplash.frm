VERSION 5.00
Begin VB.Form frmSplash 
   BackColor       =   &H00FFFFFF&
   BorderStyle     =   3  'Fixed Dialog
   ClientHeight    =   3615
   ClientLeft      =   255
   ClientTop       =   1410
   ClientWidth     =   6210
   ClipControls    =   0   'False
   ControlBox      =   0   'False
   Icon            =   "frmSplash.frx":0000
   KeyPreview      =   -1  'True
   LinkTopic       =   "Form2"
   MaxButton       =   0   'False
   MinButton       =   0   'False
   ScaleHeight     =   3615
   ScaleWidth      =   6210
   ShowInTaskbar   =   0   'False
   StartUpPosition =   2  'CenterScreen
   Begin VB.Frame Frame1 
      BackColor       =   &H00FFFFFF&
      BorderStyle     =   0  'None
      Height          =   4050
      Left            =   0
      MousePointer    =   11  'Hourglass
      TabIndex        =   0
      Top             =   0
      Width           =   6225
      Begin VB.Timer Timer1 
         Interval        =   1000
         Left            =   2640
         Top             =   2880
      End
      Begin VB.Label Label3 
         Alignment       =   2  'Center
         BackColor       =   &H00FFFFFF&
         Caption         =   "Payroll Accounting System"
         BeginProperty Font 
            Name            =   "Monotype Corsiva"
            Size            =   20.25
            Charset         =   0
            Weight          =   700
            Underline       =   0   'False
            Italic          =   -1  'True
            Strikethrough   =   0   'False
         EndProperty
         ForeColor       =   &H00008000&
         Height          =   1095
         Left            =   240
         TabIndex        =   3
         Top             =   2280
         Width           =   3135
      End
      Begin VB.Label Label2 
         Alignment       =   2  'Center
         BackColor       =   &H00FFFFFF&
         Caption         =   "Software Tools Project"
         BeginProperty Font 
            Name            =   "Monotype Corsiva"
            Size            =   20.25
            Charset         =   0
            Weight          =   700
            Underline       =   0   'False
            Italic          =   -1  'True
            Strikethrough   =   0   'False
         EndProperty
         ForeColor       =   &H00008000&
         Height          =   1095
         Left            =   240
         TabIndex        =   2
         Top             =   960
         Width           =   3135
      End
      Begin VB.Label Label1 
         Alignment       =   2  'Center
         BackColor       =   &H00FFFFFF&
         Caption         =   "Abhinav Jha and Abhishek Anand"
         BeginProperty Font 
            Name            =   "Monotype Corsiva"
            Size            =   20.25
            Charset         =   0
            Weight          =   700
            Underline       =   0   'False
            Italic          =   -1  'True
            Strikethrough   =   0   'False
         EndProperty
         ForeColor       =   &H00C0C000&
         Height          =   735
         Left            =   120
         TabIndex        =   1
         Top             =   120
         Width           =   6015
      End
      Begin VB.Image imgLogo 
         Height          =   2385
         Left            =   3720
         Picture         =   "frmSplash.frx":000C
         Stretch         =   -1  'True
         Top             =   960
         Width           =   2295
      End
   End
End
Attribute VB_Name = "frmSplash"
Attribute VB_GlobalNameSpace = False
Attribute VB_Creatable = False
Attribute VB_PredeclaredId = True
Attribute VB_Exposed = False
Private Sub Timer1_Timer()
Timer1.Enabled = False
Unload Me
frmLogin.show
End Sub

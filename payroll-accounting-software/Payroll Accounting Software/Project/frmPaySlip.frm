VERSION 5.00
Begin VB.Form frmPaySlip 
   BorderStyle     =   3  'Fixed Dialog
   Caption         =   "Employee Pay Slip Report"
   ClientHeight    =   1830
   ClientLeft      =   45
   ClientTop       =   375
   ClientWidth     =   6015
   LinkTopic       =   "Form1"
   MaxButton       =   0   'False
   MDIChild        =   -1  'True
   MinButton       =   0   'False
   ScaleHeight     =   1830
   ScaleWidth      =   6015
   ShowInTaskbar   =   0   'False
   Begin VB.Frame Frame1 
      BackColor       =   &H00FFFFC0&
      BorderStyle     =   0  'None
      Height          =   5775
      Left            =   0
      TabIndex        =   0
      Top             =   -120
      Width           =   9615
      Begin VB.CommandButton show 
         BackColor       =   &H00C0FFC0&
         Caption         =   "Show Report"
         BeginProperty Font 
            Name            =   "Palatino Linotype"
            Size            =   14.25
            Charset         =   0
            Weight          =   700
            Underline       =   0   'False
            Italic          =   0   'False
            Strikethrough   =   0   'False
         EndProperty
         Height          =   495
         Left            =   1560
         MaskColor       =   &H00000080&
         Style           =   1  'Graphical
         TabIndex        =   2
         Top             =   1200
         Width           =   2295
      End
      Begin VB.TextBox empID 
         BackColor       =   &H00C0FFC0&
         BeginProperty Font 
            Name            =   "Times New Roman"
            Size            =   14.25
            Charset         =   0
            Weight          =   400
            Underline       =   0   'False
            Italic          =   0   'False
            Strikethrough   =   0   'False
         EndProperty
         ForeColor       =   &H000000C0&
         Height          =   375
         Left            =   2520
         TabIndex        =   1
         Top             =   600
         Width           =   3135
      End
      Begin VB.Label empIDlabel 
         BackStyle       =   0  'Transparent
         Caption         =   "Employee ID"
         BeginProperty Font 
            Name            =   "Palatino Linotype"
            Size            =   14.25
            Charset         =   0
            Weight          =   700
            Underline       =   0   'False
            Italic          =   0   'False
            Strikethrough   =   0   'False
         EndProperty
         ForeColor       =   &H000000C0&
         Height          =   375
         Left            =   360
         TabIndex        =   3
         Top             =   600
         Width           =   1815
      End
   End
End
Attribute VB_Name = "frmPaySlip"
Attribute VB_GlobalNameSpace = False
Attribute VB_Creatable = False
Attribute VB_PredeclaredId = True
Attribute VB_Exposed = False
Dim errreply As String

Private Sub show_Click()
    If empID = "" Then
        errreply = MsgBox("Please Enter Employee's ID", vbCritical + vbOKOnly, "Error")
        empID.SetFocus
    Else
    Set rsEmp = Nothing
        Set rsEmp = New ADODB.Recordset
        errreply = "SELECT * FROM emptable WHERE ID LIKE '" & empID.Text & "'"
        rsEmp.Open errreply, con, adOpenForwardOnly, adLockOptimistic
        If rsEmp.EOF = True Then
            errreply = MsgBox("Employee Does Not Exist", vbCritical + vbOKOnly, "Error")
            empID.SetFocus
        Else
            Me.Hide
            With envpayslip
            If .rscomm1.State <> 0 Then .rscomm1.Close
            .comm1 empID.Text
            End With
            rptpayslip.show
            Unload Me
        End If
    End If
End Sub

Private Sub empID_KeyPress(KeyAscii As Integer)
    If KeyAscii = 13 Then
        show_Click
    End If
End Sub

"use client";

import { useState } from "react";
import { ArrowRightIcon, CheckIcon } from "./Icons";
import { SITE } from "@/lib/site";

type FormState = {
  name: string;
  phone: string;
  email: string;
  service: string;
  bill: string;
  city: string;
  message: string;
};

const INITIAL: FormState = {
  name: "",
  phone: "",
  email: "",
  service: "Solar Rooftop",
  bill: "",
  city: "Tirupati",
  message: "",
};

const SERVICES_LIST = [
  "Solar Rooftop",
  "Solar Water Heater",
  "Solar Street Lights",
  "Solar Fencing",
  "Solar Pumpset",
  "Operation & Maintenance (AMC)",
  "Other",
] as const;

export function ContactForm() {
  const [form, setForm] = useState<FormState>(INITIAL);
  const [submitted, setSubmitted] = useState(false);

  const update = <K extends keyof FormState>(key: K, value: FormState[K]) => {
    setForm((prev) => ({ ...prev, [key]: value }));
  };

  const handleSubmit = (e: React.FormEvent<HTMLFormElement>) => {
    e.preventDefault();
    const lines = [
      `*New Solar Quote Request*`,
      `Name: ${form.name}`,
      `Phone: ${form.phone}`,
      form.email && `Email: ${form.email}`,
      `Service: ${form.service}`,
      form.bill && `Monthly Bill: ₹${form.bill}`,
      `City: ${form.city}`,
      form.message && `Message: ${form.message}`,
    ].filter(Boolean);
    const text = encodeURIComponent(lines.join("\n"));
    const waUrl = `${SITE.whatsappRaw}?text=${text}`;
    setSubmitted(true);
    if (typeof window !== "undefined") {
      window.open(waUrl, "_blank", "noopener,noreferrer");
    }
  };

  if (submitted) {
    return (
      <div className="rounded-3xl bg-white p-8 md:p-10 border border-solar-100 shadow-md text-center">
        <div className="inline-flex h-16 w-16 items-center justify-center rounded-full bg-eco-500 text-white">
          <CheckIcon size={32} />
        </div>
        <h3 className="mt-5 text-2xl font-bold text-sky-deep">Thanks, {form.name || "there"}!</h3>
        <p className="mt-2 text-slate-600">
          Your enquiry has been sent on WhatsApp. Our team will respond within a few hours.
        </p>
        <button
          type="button"
          onClick={() => {
            setForm(INITIAL);
            setSubmitted(false);
          }}
          className="mt-6 btn-outline inline-flex items-center gap-2 rounded-full px-5 py-2.5 text-sm font-semibold"
        >
          Send another enquiry
        </button>
      </div>
    );
  }

  return (
    <form
      onSubmit={handleSubmit}
      className="rounded-3xl bg-white p-7 md:p-8 border border-solar-100 shadow-md"
    >
      <h3 className="text-2xl font-bold text-sky-deep">Get a free quote</h3>
      <p className="mt-1 text-sm text-slate-600">
        Fill in your details. We&apos;ll send a sized proposal within 24 hours.
      </p>

      <div className="mt-6 grid gap-4 sm:grid-cols-2">
        <Field label="Full Name" required>
          <input
            type="text"
            value={form.name}
            onChange={(e) => update("name", e.target.value)}
            required
            placeholder="Ramesh Reddy"
            className="form-input"
          />
        </Field>

        <Field label="Phone" required>
          <input
            type="tel"
            value={form.phone}
            onChange={(e) => update("phone", e.target.value)}
            required
            pattern="[0-9+\s-]{10,15}"
            placeholder="9701426440"
            className="form-input"
          />
        </Field>

        <Field label="Email">
          <input
            type="email"
            value={form.email}
            onChange={(e) => update("email", e.target.value)}
            placeholder="you@example.com"
            className="form-input"
          />
        </Field>

        <Field label="City" required>
          <input
            type="text"
            value={form.city}
            onChange={(e) => update("city", e.target.value)}
            required
            placeholder="Tirupati"
            className="form-input"
          />
        </Field>

        <Field label="Service Interested In" required>
          <select
            value={form.service}
            onChange={(e) => update("service", e.target.value)}
            className="form-input"
          >
            {SERVICES_LIST.map((s) => (
              <option key={s} value={s}>
                {s}
              </option>
            ))}
          </select>
        </Field>

        <Field label="Avg. Monthly Bill (₹)">
          <input
            type="number"
            min={0}
            value={form.bill}
            onChange={(e) => update("bill", e.target.value)}
            placeholder="2500"
            className="form-input"
          />
        </Field>

        <div className="sm:col-span-2">
          <Field label="Message">
            <textarea
              value={form.message}
              onChange={(e) => update("message", e.target.value)}
              rows={4}
              placeholder="Tell us about your roof, location, or any specific needs."
              className="form-input resize-none"
            />
          </Field>
        </div>
      </div>

      <button
        type="submit"
        className="mt-6 btn-primary inline-flex items-center justify-center gap-2 w-full sm:w-auto rounded-full px-7 py-3.5 text-sm font-semibold"
      >
        Send Enquiry on WhatsApp
        <ArrowRightIcon size={18} />
      </button>

      <p className="mt-3 text-xs text-slate-500">
        We respect your privacy. Your details are sent directly to our team — never shared.
      </p>

      <style jsx>{`
        :global(.form-input) {
          width: 100%;
          padding: 0.75rem 1rem;
          border-radius: 0.75rem;
          border: 1px solid #ffefc7;
          background: #fffbf3;
          font-size: 0.875rem;
          color: #0f172a;
          transition: border-color 0.2s ease, background 0.2s ease;
          font-family: inherit;
        }
        :global(.form-input:focus) {
          outline: none;
          border-color: #f97316;
          background: #ffffff;
          box-shadow: 0 0 0 3px rgba(249, 115, 22, 0.15);
        }
        :global(.form-input::placeholder) {
          color: #94a3b8;
        }
      `}</style>
    </form>
  );
}

function Field({
  label,
  required,
  children,
}: {
  label: string;
  required?: boolean;
  children: React.ReactNode;
}) {
  return (
    <label className="block">
      <span className="text-xs font-semibold uppercase tracking-wider text-slate-600">
        {label}
        {required && <span className="text-solar-600 ml-0.5">*</span>}
      </span>
      <span className="mt-1.5 block">{children}</span>
    </label>
  );
}

import Link from "next/link";
import { SITE } from "@/lib/site";
import { ArrowRightIcon, PhoneIcon, WhatsAppIcon } from "./Icons";

type Props = {
  title?: string;
  description?: string;
};

export function CTABanner({
  title = "Ready to switch to solar?",
  description = "Talk to our experts in Tirupati. Free consultation, transparent pricing, end-to-end execution.",
}: Props) {
  return (
    <section className="relative">
      <div className="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div className="relative overflow-hidden rounded-3xl bg-sky-deep px-6 py-12 md:px-12 md:py-16 shadow-2xl">
          <div className="absolute -top-32 -right-32 h-80 w-80 rounded-full sun-gradient opacity-50 blur-3xl" aria-hidden />
          <div className="absolute -bottom-32 -left-32 h-80 w-80 rounded-full bg-eco-500 opacity-20 blur-3xl" aria-hidden />
          <div className="absolute inset-0 grid-bg opacity-[0.05]" aria-hidden />

          <div className="relative grid gap-8 lg:grid-cols-2 lg:items-center">
            <div className="text-white">
              <h2 className="text-3xl md:text-4xl lg:text-5xl font-bold tracking-tight">
                {title}
              </h2>
              <p className="mt-4 text-base md:text-lg text-slate-200 max-w-xl">
                {description}
              </p>
            </div>
            <div className="flex flex-col sm:flex-row lg:justify-end gap-3">
              <a
                href={SITE.phoneHref}
                className="btn-primary inline-flex items-center justify-center gap-2 rounded-full px-6 py-4 text-sm font-semibold"
              >
                <PhoneIcon size={18} />
                {SITE.phone}
              </a>
              <a
                href={SITE.whatsapp}
                target="_blank"
                rel="noopener noreferrer"
                className="inline-flex items-center justify-center gap-2 rounded-full bg-[#25D366] px-6 py-4 text-sm font-semibold text-white shadow-lg hover:scale-105 transition-transform"
              >
                <WhatsAppIcon size={18} />
                WhatsApp Quote
              </a>
              <Link
                href="/contact"
                className="inline-flex items-center justify-center gap-2 rounded-full bg-white text-sky-deep px-6 py-4 text-sm font-semibold hover:scale-105 transition-transform"
              >
                Contact Form
                <ArrowRightIcon size={18} />
              </Link>
            </div>
          </div>
        </div>
      </div>
    </section>
  );
}
